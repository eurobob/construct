<?php

namespace Livit\Build;

use Illuminate\Support\ServiceProvider;

class EditableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('edit', function ($app) {
            return new \Livit\Build\Models\Editable();
        });
        $this->app->alias('edit', '\Livit\Build\Models\Editable');
    }
}
