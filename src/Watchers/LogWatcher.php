<?php
namespace LogdoPhp\Watchers;

use Throwable;
use Illuminate\Support\Arr;
use LogdoPhp\Watchers\Watcher;
use Illuminate\Log\Events\MessageLogged;
use LogdoPhp\Exceptions\LogdoException;
use LogdoPhp\Jobs\SendLogToLoggingService;

class LogWatcher extends Watcher
{
    /**
     * Register the watcher.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function register($app)
    {
        $app['events']->listen(MessageLogged::class, [$this, 'recordLog']);
    }

    /**
     * Record a message was logged.
     *
     * @param  \Illuminate\Log\Events\MessageLogged  $event
     * @return void
     */
    public function recordLog($event)
    {
        $exception_log = [];

        if (!empty($event->context)) {
            $exception = $event->context['exception'];
            if (isset($exception)) {
                $trace = collect($exception->getTrace())->map(function ($item) {
                    return Arr::only($item, ['file', 'line']);
                })->toArray();
        
                $exception_log = [
                    'class' => get_class($exception),
                    'file' => $exception->getFile(),
                    'line' => $exception->getLine(),
                    'message' => $exception->getMessage(),
                    'context' => transform(Arr::except($event->context, ['exception', 'telescope']), function ($context) {
                        return ! empty($context) ? $context : null;
                    }),
                    'trace' => $trace,
                ];
            }
        }

        if (empty(config('logdo.app_id'))) {
            throw new LogdoException("You need to configure your app id in config/logdo.php");
        }

        if (empty(config('logdo.api_token'))) {
            throw new LogdoException("You need to configure your API TOKEN in config/logdo.php");
        }
        
        // Send log to server here
        SendLogToLoggingService::dispatch($event->level, $event->message, $exception_log);
    }
}