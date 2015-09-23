<?php

namespace Livit\Build;

use Illuminate\Support\ServiceProvider;

class LivitBuildServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Views', 'build');

        $this->publishes([
            __DIR__.'/Views' => base_path('resources/views/livit/build'),
        ]);

        include __DIR__.'/routes.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
