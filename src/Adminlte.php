<?php

namespace gionnivaleriana\laravelAdminlte;

use SleepingOwl\Admin\Menu\MenuItem as BaseMenuItem;

/**
 * Class Adminlte
 *
 * @author  Joy Lazari <joy.lazari@gmail.com>
 * @package gionnivaleriana\laravelAdminlte
 */
class Adminlte {
    protected static $instance;

    /**
     * @return Adminlte
     */
    public static function instance() {
        if (is_null(static::$instance)) {
            app('\gionnivaleriana\laravelAdminlte\Adminlte');
        }
        return static::$instance;
    }

    public static function render(BaseMenuItem $menuItem){
        $menu = new MenuItem($menuItem);
        return $menu->render();
    }

}