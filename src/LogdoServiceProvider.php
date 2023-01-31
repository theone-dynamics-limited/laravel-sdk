<?php
namespace LogdoPhp;

use LogdoPhp\Logdo;
use Illuminate\Support\ServiceProvider;

class LogdoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/logdo.php' => config_path('logdo.php'),
        ], 'config');

        LogdoEntry::start($this->app);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Logdo::class, function ($app) {
            return new Logdo(config('logdo'));
        });

        $this->mergeConfigFrom(
            __DIR__.'/../config/logdo.php', 'logdo'
        );
    }
}