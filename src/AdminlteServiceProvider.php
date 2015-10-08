<?php

namespace GionniValeriana\laravelAdminlte;

use Illuminate\Support\ServiceProvider;

/**
 * Class AdminlteServiceProvider
 * @author  Joy Lazari <joy.lazari@gmail.com>
 * @package GionniValeriana\laravelAdminlte
 */
class AdminlteServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     * @return void
     */
    public function register() {
        $this->app->bindShared('GionniValeriana\laravelAdminlte\Adminlte', function ($app) {
            return app('\GionniValeriana\laravelAdminlte\Adminlte');
        });
        $this->app->singleton('adminlte', 'GionniValeriana\laravelAdminlte\Adminlte');
    }

    public function boot() {
        $this->loadViewsFrom(__DIR__ . '/views', 'adminlte');

        $this->publishes([
            base_path() . '/vendor/almasaeed2010/adminlte/' => public_path('packages/GionniValeriana/adminlte/'),
        ], 'assets');
    }

}