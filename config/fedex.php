<?php

return [
    'api_key' => env('FEDEX_API_KEY'),
    'clientId' => env('FEDEX_CLIENT_ID'),
    'clientSecret' => env('FEDEX_CLIENT_SECRET'),
    'trace' => env('FEDEX_TRACE', true),
    'exceptions' => env('FEDEX_EXCEPTIONS', true),
    'location' => env('FEDEX_API_URL', 'https://wsbeta.fedex.com:443/web-services/office'),
    'apiBaseUrl' => env('FEDEX_API_BASE_URL', 'https://api.office.fedex.com'),
    'documentUploadHostname' => env('FEDEX_UPLOAD_HOSTNAME', 'https://dunc.fedex.com/document/fedexoffice/v1/documents'),
    'document-preview-hostname' => env('FEDEX_PREVIEW_HOSTNAME', 'https://dunc.dmz.fedex.com'),
];
