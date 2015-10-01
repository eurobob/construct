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

        $this->loadViewsFrom(__DIR__.'/views', 'build');

        $this->publishes([
            __DIR__.'/bower.json' => base_path('bower.json'),
            __DIR__.'/.bowerrc' => base_path('.bowerrc'),
            __DIR__.'/package.json' => base_path('package.json'),
            __DIR__.'/gulpfile.js' => base_path('gulpfile.js'),
            __DIR__.'/config/blog.php' => config_path('blog.php'),
            __DIR__.'/config/mail.php' => config_path('mail.php'),
            __DIR__.'/config/filesystems.php' => config_path('filesystems.php'),
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
