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
    'contactInformationCompany' => env('CONTACT_COMPANY'),
    'contactInformationEmail' => env('CONTACT_EMAIL'),
    'contactInformationFirstName' => env('CONTACT_FIRST_NAME'),
    'contactInformationLastName' => env('CONTACT_LAST_NAME'),
    'contactInformationPhoneNumber' => env('CONTACT_PHONE_NUMBER'),
    'contactInformationExtension' => env('CONTACT_EXTENSION'),
    'billingInformationCity' => env('BILLING_CITY'),
    'billingInformationCountryCode' => env('BILLING_COUNTRY_CODE'),
    'billingInformationPostalCode' => env('BILLING_POSTAL_CODE'),
    'billingInformationStateOrProvinceCode' => env('BILLING_STATE_OR_PROVINCE_CODE'),
    'billingInformationStreetLines' => env('BILLING_STREET_LINES'),
];
