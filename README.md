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

        'GionniValeriana\laravelAdminlte\AdminlteServiceProvider',

    ],
    
    // ...
    
    'aliases' => [
    
        // ...
    
        'Adminlte' => 'GionniValeriana\laravelAdminlte\Adminlte',
    
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