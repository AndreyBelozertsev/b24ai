<?php

return [
    'auth' =>[
        'clinet_id' => env('BITRIX24_PHP_SDK_APPLICATION_CLIENT_ID'),
        'clinet_secret' => env('BITRIX24_PHP_SDK_APPLICATION_CLIENT_SECRET' ),
        'scope' => env('BITRIX24_PHP_SDK_APPLICATION_SCOPE'),
        'portal_domain' => env('BITRIX24_PHP_SDK_PORTAL_DOMAIN'),
        'redirect_oauth_url' => env('BITRIX24_PHP_SDK_REDIRECT_OAUTH_URL'),
    ]
];