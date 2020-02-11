<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
        'client_id' => '111070037364-v6fuls5os8rmeauhjd9elrmtvacrroeo.apps.googleusercontent.com', 
        'client_secret' => 'TWIaVOOCFoW7Y3sglhjZDpER',
        'redirect' =>   url('callback'),
        //'redirect' => 'http://localhost/soorty/redirect',
    ],
    'facebook' => [
        'client_id' => '353613588674958',
        'client_secret' => '99d46590a4567d6eccb8c0ad56f275bb',
        'redirect' => url('fb-callback'),
    ],

];
