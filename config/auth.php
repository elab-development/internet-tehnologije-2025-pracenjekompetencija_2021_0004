<?php

return [



    'defaults' => [
        'guard' => 'api',
        'passwords' => 'korisnici',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'korisnici',
        ],
        'api' => [
            'driver' => 'jwt',
            'provider' => 'korisnici',
        ],
    ],
    
    'providers' => [
        'korisnici' => [
            'driver' => 'eloquent',
            'model' => App\Models\Korisnik::class,
        ],
    ],


    'passwords' => [
        'korisnici' => [
            'provider' => 'korisnici',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],


    'password_timeout' => 10800,

];
