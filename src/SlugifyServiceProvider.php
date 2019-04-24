<?php

namespace rafapaulino\Slugify;

use Illuminate\Support\ServiceProvider;

class SlugifyServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'rafapaulino');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'rafapaulino');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/slugify.php', 'slugify');

        // Register the service the package provides.
        $this->app->singleton('slugify', function ($app) {
            return new Slugify;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['slugify'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/slugify.php' => config_path('slugify.php'),
        ], 'slugify.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/rafapaulino'),
        ], 'slugify.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/rafapaulino'),
        ], 'slugify.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/rafapaulino'),
        ], 'slugify.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
