<?php

namespace Spatie\Tail;

use Illuminate\Support\ServiceProvider;
use Spatie\Tail\TailCommand;

class IdeHelperServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../config/ide-helper.php';
        $this->mergeConfigFrom($configPath, 'ide-helper');
        
        $this->app['command.tail'] = $this->app->share(
            function ($app) {
                return new TailCommand();
            }
        );


    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['command.tail'];
    }

}
