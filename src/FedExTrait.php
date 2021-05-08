<?php

namespace EXACTSports\FedEx;

use EXACTSports\FedEx\Fedex\WebAuthenticationDetail; 
use EXACTSports\FedEx\Fedex\ClientDetail; 
use EXACTSports\FedEx\Fedex\TransactionDetail; 
use EXACTSports\FedEx\Fedex\Version; 
use EXACTSports\FedEx\Fedex\RequestedOfficeOrder;
use EXACTSports\FedEx\Fedex\OfficeOrderChargesPayment;
use EXACTSports\FedEx\Fedex\CustomerReferences;

trait FedExTrait
{

    public WebAuthenticationDetail $webAuthenticationDetail; 
    public ClientDetail $clientDetail; 
    public TransactionDetail $transactionDetail; 
    public Version $version; 
    public RequestedOfficeOrder $requestedOfficeOrder;
    public OfficeOrderChargesPayment $officeOrderChargesPayment;
    public CustomerReferences $customerReferences;
    
    public function __construct(
        WebAuthenticationDetail $webAuthenticationDetail, 
        ClientDetail $clientDetail, 
        TransactionDetail $transactionDetail,
        Version $version,
        RequestedOfficeOrder $requestedOfficeOrder,
        OfficeOrderChargesPayment $officeOrderChargesPayment,
        CustomerReferences $customerReferences)
    {
        $this->webAuthenticationDetail = $webAuthenticationDetail; 
        $this->clientDetail = $clientDetail;
        $this->transactionDetail = $transactionDetail;
        $this->version = $version;
        $this->requestedOfficeOrder = $requestedOfficeOrder;
        $this->officeOrderChargesPayment = $officeOrderChargesPayment;
        $this->customerReferences = $customerReferences;
    } 

    /**
     * Converts request object to array
     * @param $requestObject
     * @return array
     */
    public function toArray($requestObject)
    {
        $array = json_decode(json_encode($requestedObject), true);

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
                $request[$ucKey] = ucFirstKeys($value);
            }
    
         }
    
         return $request;
    }
}
