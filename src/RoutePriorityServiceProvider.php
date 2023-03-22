<?php namespace Mprince\RoutePriority;

use Illuminate\Support\ServiceProvider;

class RoutePriorityServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['router'] = $this->app->share(function($app)
        {
            return new \Mprince\RoutePriority\Router($app['events'], $app);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['router'];
    }
}