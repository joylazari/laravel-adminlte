Laravel AdminLTE
================
An Almsaeed's AdminLTE template built for Sleeping Owl's Admin, an administrative interface builder for Laravel 5.

Built with & for
================
* [Laravel 5](http://github.com/laravel/laravel) by Taylor Otwell
* [Admin](http://github.com/sleeping-owl/admin) by Sleeping Owl
* [AdminLTE](http://github.com/almasaeed2010/AdminLTE) by Abdullah Almsaeed

Installation
============

Step 1: Download the package
----------------------------

Open a command console, enter your project directory and execute the following command to download the latest stable version of this package:

```bash
$ composer require gionnivaleriana/laravel-adminlte "*"
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

        'gionnivaleriana\LaravelAdminlteServiceProvider',

    ],
    
    // ...
    
    'aliases' => [
    
        // ...
    
        'Adminlte'     => 'gionnivaleriana\laraveladminlte',
    
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

Work in progress
----------------
- [x] Override views
- [x] Override menu renderer
- [ ] Override assets

Author
======
* ![Joy Lazari](https://avatars0.githubusercontent.com/u/6898095?s=15) Joy Lazari ([Gionni Valeriana](https://github.com/gionnivaleriana))