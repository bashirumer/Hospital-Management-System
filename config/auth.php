<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
       'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ], 
        'doctor' => [
            'driver' => 'session',
            'provider' => 'doctors',
        ],
        'assistant' => [
            'driver' => 'session',
            'provider' => 'assistants',
        ],
        'receptionist' => [
            'driver' => 'session',
            'provider' => 'receptionists',
        ],
        'patient' => [
            'driver' => 'session',
            'provider' => 'patients',
        ],
    ],

    'providers' => [

        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'doctors' => [
            'driver' => 'eloquent',
            'model' => App\Models\Doctor::class,
        ],
        'assistants' => [
            'driver' => 'eloquent',
            'model' => App\Models\Assistant::class,
        ],
        'receptionists' => [
            'driver' => 'eloquent',
            'model' => App\Models\Receptionist::class,
        ],
        'patients' => [
            'driver' => 'eloquent',
            'model' => App\Models\Patient::class,
        ],


    ],

    'passwords' => [

        'doctors' => [
            'provider' => 'doctors',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'assistants' => [
            'provider' => 'assistants',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'receptionists' => [
            'provider' => 'receptionists',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'patients' => [
            'provider' => 'patients',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
