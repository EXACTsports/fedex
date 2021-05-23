<?php

namespace EXACTSports\FedEx;

class Client extends \SoapClient
{
    public function __construct() 
    {
        parent::__construct(__DIR__ . '../_wdsl/OfficeOrderService_v2.wsdl', [
            'location' => config('fedex.api_url'),
            'trace' => config('fedex.trace'),
            'exceptions' => config('fedex.exceptions'),
        ]);
    }
}
