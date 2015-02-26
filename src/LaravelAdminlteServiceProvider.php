<?php

namespace gionnivaleriana\laravelAdminlte;

use Illuminate\Support\ServiceProvider;

class AdminlteServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app->bindShared('gionnivaleriana\laravelAdminlte\Adminlte', function ($app) {
            return app('\gionnivaleriana\laravelAdminlte\Adminlte');
        }
        );
        $this->app->singleton('adminlte', 'gionnivaleriana\laravelAdminlte\Adminlte');
    }

    public function boot() {
        $this->loadViewsFrom(__DIR__ . '/views', 'adminlte');

        $this->publishes([
                             __DIR__ . '/views' => base_path('resources/views/vendor/adminlte'),
                         ]
        );
    }

}