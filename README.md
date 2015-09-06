Laravel AdminLTE
================
[![Build Status](https://travis-ci.org/gionnivaleriana/laravel-adminlte.svg)](https://travis-ci.org/gionnivaleriana/laravel-adminlte)
[![Latest Stable Version](https://poser.pugx.org/gionnivaleriana/laravel-adminlte/v/stable.svg)](https://packagist.org/packages/gionnivaleriana/laravel-adminlte) 
[![Total Downloads](https://poser.pugx.org/gionnivaleriana/laravel-adminlte/downloads.svg)](https://packagist.org/packages/gionnivaleriana/laravel-adminlte) 
[![Latest Unstable Version](https://poser.pugx.org/gionnivaleriana/laravel-adminlte/v/unstable.svg)](https://packagist.org/packages/gionnivaleriana/laravel-adminlte) 
[![License](https://poser.pugx.org/gionnivaleriana/laravel-adminlte/license.svg)](https://packagist.org/packages/gionnivaleriana/laravel-adminlte)
[![HHVM Status](http://hhvm.h4cc.de/badge/gionnivaleriana/laravel-adminlte.svg)](http://hhvm.h4cc.de/package/gionnivaleriana/laravel-adminlte)

An Almsaeed's AdminLTE template built for Sleeping Owl's Admin, an administrative interface builder for Laravel 5.

- [Installation](#installation)
- [Usage](#usage)
- [Requirements](#requirements)
- [Author](#author)

Installation
============

Step 1: Download the package
----------------------------

Open a command console, enter your project directory and execute the following command to download the latest stable version of this package:

```bash
$ composer require gionnivaleriana/laravel-adminlte:dev-master
```

This command requires you to have Composer installed globally, as explained in the [installation chapter](https://getcomposer.org/doc/00-intro.md) of the Composer documentation.

Step 2: Enable the package
--------------------------

Then, enable the package by adding the following line in the `app/config.php` file of your project:

```php
<?php
// app/config.php

return [

    'providers' => [

        // ...

        GionniValeriana\laravelAdminlte\AdminlteServiceProvider::class

    ],
    
    // ...
    
    'aliases' => [
    
        // ...
    
        'Adminlte' => GionniValeriana\laravelAdminlte\Adminlte::class,
    
    ],
    
];
```

Step 3: Use the package
-----------------------

To use the package/template overriding the default one by Sleeping Owl, modify the following line in the `app/admin.php` file of your project:

The `app/admin.php` file is generated during the Sleeping Owl's Admin package installation by the command `admin:install`.

```php
<?php
// app/admin.php

return [
    
    // ...

    'bladePrefix' => 'adminlte::',
    
];
```

Then publish the assets (css, js..) to your public folder with the command

```bash
$ php artisan vendor:publish
```

Add the styles and scripts in the AppServiceProvider

```php
<?php
// app/Providers/AppServiceProvider.php

    // ...

    public function register() {

        // ...

        config([
            'preload.styles' => [
                asset('packages/GionniValeriana/adminlte/bootstrap/css/bootstrap.min.css'),
                asset('packages/GionniValeriana/adminlte/plugins/font-awesome/font-awesome.min.css'),
                asset('packages/GionniValeriana/adminlte/plugins/ionicons/ionicons.min.css'),
                asset('packages/GionniValeriana/adminlte/dist/css/AdminLTE.min.css'),
                asset('packages/GionniValeriana/adminlte/dist/css/skins/_all-skins.min.css'),
                asset('packages/GionniValeriana/adminlte/plugins/iCheck/flat/blue.css'),
                asset('packages/GionniValeriana/adminlte/plugins/morris/morris.css'),
                asset('packages/GionniValeriana/adminlte/plugins/datatables/dataTables.bootstrap.css'),
                asset('packages/GionniValeriana/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css'),
                asset('packages/GionniValeriana/adminlte/plugins/datepicker/datepicker3.css'),
                asset('packages/GionniValeriana/adminlte/plugins/daterangepicker/daterangepicker-bs3.css'),
                asset('packages/GionniValeriana/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'),
            ],
            'preload.scripts' => [
                asset('packages/GionniValeriana/adminlte/plugins/jQuery/jQuery-2.1.3.min.js'),
                asset('packages/GionniValeriana/adminlte/bootstrap/js/bootstrap.min.js'),
                asset('packages/GionniValeriana/adminlte/plugins/input-mask/jquery.inputmask.js'),
                asset('packages/GionniValeriana/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js'),
                asset('packages/GionniValeriana/adminlte/plugins/input-mask/jquery.inputmask.extensions.js'),
                asset('packages/GionniValeriana/adminlte/plugins/moment/moment.min.js'),
                asset('packages/GionniValeriana/adminlte/plugins/daterangepicker/daterangepicker.js'),
                asset('packages/GionniValeriana/adminlte/plugins/colorpicker/bootstrap-colorpicker.min.js'),
                asset('packages/GionniValeriana/adminlte/plugins/timepicker/bootstrap-timepicker.min.js'),
                asset('packages/GionniValeriana/adminlte/plugins/datatables/jquery.dataTables.js'),
                asset('packages/GionniValeriana/adminlte/plugins/datatables/dataTables.bootstrap.js'),
                asset('packages/GionniValeriana/adminlte/plugins/slimScroll/jquery.slimscroll.min.js'),
                asset('packages/GionniValeriana/adminlte/plugins/iCheck/icheck.min.js'),
                asset('packages/GionniValeriana/adminlte/plugins/fastclick/fastclick.min.js'),
            ],
        ]);
    }
```

And then load that with Sleeping Owl's bootstrap script

```php
<?php
// app/admin/bootstrap.php

use Illuminate\Support\Facades\Config;
use SleepingOwl\Admin\AssetManager\AssetManager;

$assets = new AssetManager();

foreach (Config::get('preload.styles') as $style) {
    $assets->addStyle($style);
}

foreach (Config::get('preload.scripts') as $script) {
    $assets->addScript($script);
}
```

Usage
=====
Let's start creating a "Start Page" menu item as described in [Sleeping Owl's doc](http://sleeping-owl.github.io/en/Getting_Started/Menu_Configuration.html).

```php
// app/admin/menu.php

Admin::menu()->url('/')
             ->label('Start Page')
             ->icon('fa-dashboard')
             ->uses('\App\HTTP\Controllers\AdminController@getIndex');

```

Standard blank page
-------------------
To view the standard blank page from this package, in `\App\HTTP\Controllers\AdminController` the method `AdminController::getIndex()` should return this:

```php
// app/Http/Controllers/AdminController.php

class AdminController extends \SleepingOwl\Admin\Controllers\AdminController {

    /**
     * @return \Illuminate\View\View
     */
    public function getIndex() {
        return view('adminlte::blank');
    }
    
    // ...
    
```

Custom page/view
----------------
To use instead a custom view, let's create a new one in the view folder (default in `resources/views`)
 
```html
// resources/views/customPage.blade.php

@section('innerContent')
    <section class="content-header">
        <h1>Custom Page</h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i> Home</li>
        </ol>
    </section>
    <section class="content">
    
        // ...
        
    </section>
@stop

```

Then return it in `AdminController::getIndex()`

```php
// app/Http/Controllers/AdminController.php

class AdminController extends \SleepingOwl\Admin\Controllers\AdminController {

    /**
     * @return \Illuminate\View\View
     */
    public function getIndex() {
        return view('customPage');
    }
    
    // ...
    
```

Requirements
============
* [Laravel 5](http://github.com/laravel/laravel) by Taylor Otwell
* [Admin](http://github.com/sleeping-owl/admin) by Sleeping Owl
* [AdminLTE](http://github.com/almasaeed2010/AdminLTE) by Abdullah Almsaeed

Author
======
* ![Joy Lazari](https://avatars0.githubusercontent.com/u/6898095?s=15) Joy Lazari ([Gionni Valeriana](https://github.com/gionnivaleriana))