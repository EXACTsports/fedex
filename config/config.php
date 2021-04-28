<?php

return [
    'api_key' => env('FEDEX_API_KEY'),
    
    'location' => env('FEDEX_API_URL', 'https://wsbeta.fedex.com:443/web-services/office'),
    'trace' => env('FEDEX_TRACE', true),
    'exceptions' => env('FEDEX_EXCEPTIONS', true),
];