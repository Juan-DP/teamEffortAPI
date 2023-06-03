<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => '1407322073385185',
        'client_secret' => 'a0d8cb3555bc39774e64aded7797cff7',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],
    
    'twitter' => [
        'client_id' => 'L9FWyXN5ordPSxofBDhoKKLLV',
        'client_secret' => '38n0ShMXY78jRPYBER5JdLhvytIsqJZWgFBURzo4HxYvcAch6K',
        'redirect' => 'http://localhost:8000/auth/twitter/callback',
    ],
    
];
