<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    |
    | iikoCloud login.
    |
    */
    'login' => env('IIKO_CLOUD_LOGIN'),

    /*
    |--------------------------------------------------------------------------
    | HTTP
    |--------------------------------------------------------------------------
    */
    'base_uri' => env('IIKO_BASE_URI', 'https://api-ru.iiko.services/api/1/'),
    'timeout' => env('IIKO_CLOUD_TIMEOUT', 15.0),

    /*
    |--------------------------------------------------------------------------
    | Token cache
    |--------------------------------------------------------------------------
    |
    | The TTL is automatically calculated from the expiresIn value in the response,
    | but you can set a hard upper limit here.
    |
    */
    'token_cache_ttl' => env('IIKO_TOKEN_TTL', 60 * 59), // 59 мин
    'cache_store' => env('IIKO_CACHE_STORE', null),        // null → driver по-умолчанию
];
