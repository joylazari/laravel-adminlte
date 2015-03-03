<?php

namespace GionniValeriana\laravelAdminlte;

use SleepingOwl\Admin\Menu\MenuItem as BaseMenuItem;

/**
 * Class Adminlte
 *
 * @author  Joy Lazari <joy.lazari@gmail.com>
 * @package GionniValeriana\laravelAdminlte
 */
class Adminlte {

    /**
     * @var Adminlte
     */
    protected static $instance;

    /**
     * @return Adminlte
     */
    public static function instance() {
        if (is_null(self::$instance)) {
            self::$instance = app('\GionniValeriana\laravelAdminlte\Adminlte');
        }
        return self::$instance;
    }

    public static function render(BaseMenuItem $menuItem) {
        $menu = new MenuItem($menuItem);
        return $menu->render();
    }

}