<?php

namespace gionnivaleriana;

use Illuminate\Support\ServiceProvider;

class LaravelAdminlteServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app->bindShared('gionnivaleriana\laraveladminlte', function ($app) {
            return app('\gionnivaleriana\laraveladminlte');
        }
        );
        $this->app->singleton('adminlte', 'gionnivaleriana\laraveladminlte');
    }

    public function boot() {
        $this->loadViewsFrom(__DIR__ . '/views', 'adminlte');

        $this->publishes([
                             __DIR__ . '/views' => base_path('resources/views/vendor/adminlte'),
                         ]
        );
    }

}