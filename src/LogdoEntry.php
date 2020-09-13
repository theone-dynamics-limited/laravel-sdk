<?php
namespace Logdo;

use Logdo\Watchers\RegistersWatchers;

class LogdoEntry
{
    use RegistersWatchers;

    /**
     * Register the Logdo watchers and start listening
     * for whatever you are watching for.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    public static function start($app)
    {
        static::registerWatchers($app);
    }
}