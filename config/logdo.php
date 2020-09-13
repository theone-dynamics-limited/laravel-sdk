<?php

use Logdo\Watchers\LogWatcher;

return [

    /**
     * Api configs
     */
    'app_id' => env('LOGDO_APP_ID'),
    'api_token' => env('LOGDO_API_TOKEN'),
    'backend_base_url' => env('LOGDO_BACKEND_BASE_URL', 'https://logdo.dev'),

    /**
     * Turn on and off watchers
     */
    'watchers' => [
        LogWatcher::class => env('LOGDO_LOG_WATCHER', true),
    ],
];