<?php
namespace Logdo\Watchers;

use Exception;
use Logdo\Logdo;
use Logdo\Watcher;
use Illuminate\Log\Events\MessageLogged;

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
    public function recordLog(MessageLogged $event)
    {
        if ($this->shouldIgnore($event)) {
            return;
        }

        // Send log to server here
        // [
        //     'level' => $event->level,
        //     'message' => (string) $event->message,
        //     'context' => Arr::except($event->context, ['logdo']),
        // ]
    }

    /**
     * Determine if the event should be ignored.
     *
     * @param  mixed  $event
     * @return bool
     */
    private function shouldIgnore($event)
    {
        // TODO MA
        // Define logged event that should be ignored then check them
        return isset($event->context['exception']) &&
            $event->context['exception'] instanceof Exception;
    }
}