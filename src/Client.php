<?php

namespace EXACTSports\FedEx;

class Client extends \SoapClient
{
    public function __construct($wsdl = "") 
    {
        if (empty($wsdl)) {
            $wsdl = "OfficeOrderService_v2.wsdl";
        }
        
        parent::__construct(__DIR__ . '/../_wdsl/' . $wsdl, [
            'location' => config('fedex.api_url'),
            'trace' => config('fedex.trace'),
            'exceptions' => config('fedex.exceptions')
        ]);
    }
}
