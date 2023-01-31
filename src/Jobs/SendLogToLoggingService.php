<?php

namespace LogdoPhp\Jobs;

use LogdoPhp\Logdo;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendLogToLoggingService implements ShouldQueue
{
    use Queueable;
    use Dispatchable;
    use SerializesModels;
    use InteractsWithQueue;

    private String $level;
    private String $message;
    private array $context;

    /**
     * The maximum number of unhandled exceptions to allow before failing.
     */
    public int $maxExceptions = 3;

    public function __construct(String $level, String $message, array $context = []) {
        $this->level = $level;
        $this->message = $message;
        $this->context = $context;
    }

    public function handle(): void
    {
        $app_id = config('logdo.app_id');
        $app_env = config('app.env');
        $api_token = config('logdo.api_token');
        $stack_trace = json_encode($this->context);
        Logdo::instance()
            ->logger()
            ->for(app_id: $app_id)
            ->log(log: $this->message)
            ->with(stack_trace: $stack_trace)
            // ->at(incident_datetime: ) // null so that it defaults to now.
            ->as(environment: $app_env)
            ->level(log_level: $this->level)
            ->go();
    }
}