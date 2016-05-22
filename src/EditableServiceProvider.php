<?php

namespace Eurobob\Construct;

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
            return new \Eurobob\Construct\Models\Editable();
        });
        $this->app->alias('edit', '\Eurobob\Construct\Models\Editable');
    }
}
