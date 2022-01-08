<?php

return [
    'api_key' => env('FEDEX_API_KEY'),

    'location' => env('FEDEX_API_URL', 'https://wsbeta.fedex.com:443/web-services/office'),
    'trace' => env('FEDEX_TRACE', true),
    'exceptions' => env('FEDEX_EXCEPTIONS', true),
    'apiBaseUrl' => env('FEDEX_API_BASE_URL'),
    'clientId' => env('FEDEX_CLIENT_ID'),
    'clientSecret' => env('FEDEX_CLIENT_SECRET'),
    'documentUploadHostname' => env('FEDEX_DOCUMENT_UPLOAD_HOSTNAME'),
    'document-preview-hostname' => env('FEDEX_DOCUMENT_PREVIEW_HOSTNAME'),
    'contactInformationCompany' => env('EXACTSPORTS_CONTACT_INFORMATION_COMPANY'),
    'contactInformationEmail' => env('EXACTSPORTS_CONTACT_INFORMATION_EMAIL'),
    'contactInformationFirstName' => env('EXACTSPORTS_CONTACT_INFORMATION_FIRST_NAME'),
    'contactInformationLastName' => env('EXACTSPORTS_CONTACT_INFORMATION_LAST_NAME'),
    'contactInformationPhoneNumber' => env('EXACTSPORTS_CONTACT_INFORMATION_PHONE_NUMBER'),
    'contactInformationExtension' => env('EXACTSPORTS_CONTACT_INFORMATION_EXTENSION'),
    'billingInformationCity' => env('EXACTSPORTS_BILLING_INFORMATION_CITY'),
    'billingInformationCountryCode' => env('EXACTSPORTS_BILLING_INFORMATION_COUNTRY_CODE'),
    'billingInformationPostalCode' => env('EXACTSPORTS_BILLING_INFORMATION_POSTAL_CODE'),
    'billingInformationStateOrProvinceCode' => env('EXACTSPORTS_BILLING_INFORMATION_STATE_OR_PROVINCE_CODE'),
    'billingInformationStreetLines' => env('EXACTSPORTS_BILLING_INFORMATION_STREET_LINES'),
];
