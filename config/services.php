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
        'client_id' => '941335686521856', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'client_secret' => 'adc98cadf3605057bd280a710d3a445f', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'redirect' => 'https://autenticacao.test/facebook/callback/'
    ],
    'google' => [
        'client_id' => '937902116547-vfbfe51pv5l3ql1cod1flbdvqffdrfqv.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/google/callback/'
    ]

];
