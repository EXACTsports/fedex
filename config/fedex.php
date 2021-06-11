<?php

return [
    'api_key' => env('FEDEX_API_KEY'),
    
    'location' => env('FEDEX_API_URL', 'https://wsbeta.fedex.com:443/web-services/office'),
    'trace' => env('FEDEX_TRACE', true),
    'exceptions' => env('FEDEX_EXCEPTIONS', true),
    'apiBaseUrl' => env('FEDEX_API_BASE_URL'),
    'clientId' => env('FEDEX_CLIENT_ID'),
    'clientSecret' => env('FEDEX_CLIENT_SECRET')
];