<?php

namespace Livit\Build;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class LivitBuildServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        $this->loadViewsFrom(__DIR__.'/Views', 'build');

        $this->publishes([
            __DIR__.'/Views' => base_path('resources/views/livit/build'),
            __DIR__.'/config/blog.php' => config_path('blog.php'),
            __DIR__.'/config/mail.php' => config_path('mail.php'),
            __DIR__.'/database/migrations' => $this->app->databasePath().'/migrations',
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
