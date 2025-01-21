<?php

return [
'panels' => [
    'default' => [
        'id' => 'default',
        'label' => 'Default',
        'resource_directories' => [
            'app/Filament/Resources',
        ],
        'resource_namespaces' => [
            'App\\Filament\\Resources',
        ],
    ],
],
'brand' => [
    'name' => 'Roman Admin Panel',
    'logo' => 'static/logo2.png', // Optional
],
    /*0784097775
    |--------------------------------------------------------------------------
    | Broadcasting
    |--------------------------------------------------------------------------
    |
    | By uncommenting the Laravel Echo configuration, you may connect Filament
    | to any Pusher-compatible websockets server.
    |
    | This will allow your users to receive real-time notifications.
    |
    */

    'broadcasting' => [

        // 'echo' => [
        //     'broadcaster' => 'pusher',
        //     'key' => env('VITE_PUSHER_APP_KEY'),
        //     'cluster' => env('VITE_PUSHER_APP_CLUSTER'),
        //     'forceTLS' => true,
        // ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | This is the storage disk Filament will use to put media. You may use any
    | of the disks defined in the `config/filesystems.php`.
    |
    */

    'default_filesystem_disk' => env('FILAMENT_FILESYSTEM_DISK', 'public'),



    'middleware' => [
    'web',
    \App\Http\Middleware\RestrictFilamentAccess::class,
],

];
