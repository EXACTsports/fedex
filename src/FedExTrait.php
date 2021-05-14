<?php

namespace EXACTSports\FedEx;

use EXACTSports\FedEx\Fedex\WebAuthenticationDetail; 
use EXACTSports\FedEx\Fedex\ClientDetail; 
use EXACTSports\FedEx\Fedex\TransactionDetail; 
use EXACTSports\FedEx\Fedex\Version;
use EXACTSports\FedEx\Fedex\RequestedOfficeOrder;
use EXACTSPorts\FedEx\Fedex\OrderRecipient; 

trait FedExTrait
{
    public WebAuthenticationDetail $webAuthenticationDetail; 
    public ClientDetail $clientDetail; 
    public TransactionDetail $transactionDetail; 
    public Version $version; 
    public RequestedOfficeOrder $requestedOfficeOrder;
    
    public function __construct(
        WebAuthenticationDetail $webAuthenticationDetail, 
        ClientDetail $clientDetail, 
        TransactionDetail $transactionDetail,
        Version $version,
        OrderRecipient $orderRecipient)
    {
        $this->webAuthenticationDetail = $webAuthenticationDetail; 
        $this->clientDetail = $clientDetail;
        $this->transactionDetail = $transactionDetail;
        $this->version = $version;
        $this->requestedOfficeOrder = new RequestedOfficeOrder($orderRecipient); 
    } 

    public function getRequest()
    {
        return $this->toArray($this);
    }

    /**
     * Converts request object to array
     * @param $requestObject
     * @return array
     */
    public function toArray($requestObject)
    {
        $array = json_decode(json_encode($requestObject), true);
        return $this->ucFirstKeys($array);
    }

    /**
     * Capitalizes first chart of array keys
     * @param array $array
     * @return array  
     */
    private function ucFirstKeys($array) {
        $request = [];
    
        foreach ($array as $key => $value) {
            $ucKey = ucfirst($key);
            $request[$ucKey] = $value;
    
            if (is_array($value)) {
                $request[$ucKey] = $this->ucFirstKeys($value);
            }
    
         }
    
         return $request;
    }
}
