<?php

namespace gionnivaleriana\laravelAdminlte;

use Illuminate\Support\ServiceProvider;

/**
 * Class AdminlteServiceProvider
 *
 * @author  Joy Lazari <joy.lazari@gmail.com>
 * @package gionnivaleriana\laravelAdminlte
 */
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
            base_path().'/vendor/almasaeed2010/adminlte/' => public_path('packages/gionnivaleriana/adminlte/'),
        ], 'assets');
    }

}