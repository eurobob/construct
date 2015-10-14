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
            __DIR__.'/app.scss' => base_path('resources/assets/sass/app.scss'),
            __DIR__.'/_settings.scss' => base_path('resources/assets/sass/_settings.scss'),
            __DIR__.'/.gitignore.example' => base_path('.gitignore'),
            __DIR__.'/bower.json' => base_path('bower.json'),
            __DIR__.'/.bowerrc' => base_path('.bowerrc'),
            __DIR__.'/package.json' => base_path('package.json'),
            __DIR__.'/gulpfile.js' => base_path('gulpfile.js'),
            __DIR__.'/settings.js' => base_path('settings.js'),
            __DIR__.'/config/blog.php' => config_path('blog.php'),
            __DIR__.'/config/mail.php' => config_path('mail.php'),
            __DIR__.'/config/filesystems.php' => config_path('filesystems.php'),
            __DIR__.'/database/migrations' => $this->app->databasePath().'/migrations',
        ]);

        $this->publishes([
            __DIR__.'/assets' => base_path('resources/assets/vendor/build'),
        ], 'publish');

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
