<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'paths' => [
        resource_path('views'),
        realpath(app_path('Modules/Dashboard/Auth/Resources/views')),
        realpath(app_path('Modules/Dashboard/Resources/views')),
        realpath(app_path('Modules/User/Resources/views')),
        realpath(app_path('Modules/Customer/Resources/views')),
        realpath(app_path('Modules/Category/Resources/views')),
        realpath(app_path('Modules/Product/Resources/views')),
        realpath(app_path('Modules/Attribute/Resources/views')),
        realpath(app_path('Modules/Option/Resources/views')),
        realpath(app_path('Modules/Language/Resources/views')),
        realpath(app_path('Modules/Manufacturer/Resources/views')),
        realpath(app_path('Modules/Information/Resources/views')),
        realpath(app_path('Modules/Extension/Resources/views')),
        realpath(app_path('Modules/Layout/Resources/views')),
        realpath(app_path('Modules/Blog/Resources/views')),
        realpath(app_path('Modules/Currency/Resources/views')),
        realpath(app_path('Modules/Payment/Resources/views')),
        realpath(app_path('Modules/Shipment/Resources/views')),
        realpath(app_path('Modules/Order/Resources/views')),
        realpath(app_path('Modules/Page/Resources/views')),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Typically, this is within the storage
    | directory. However, as usual, you are free to change this value.
    |
    */

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        realpath(storage_path('framework/views'))
    ),

];
