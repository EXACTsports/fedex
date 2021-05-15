<?php

namespace EXACTSports\FedEx;

use EXACTSports\FedEx\Fedex\WebAuthenticationDetail; 
use EXACTSports\FedEx\Fedex\ClientDetail; 
use EXACTSports\FedEx\Fedex\TransactionDetail; 
use EXACTSports\FedEx\Fedex\Version;
use EXACTSports\FedEx\Fedex\RequestedOfficeOrder;
use EXACTSPorts\FedEx\Fedex\OrderRecipient; 
use EXACTSports\FedEx\Client;
use EXACTSports\FedEx\CreateofficeOrder\CreatefficeOrderInterface;
use EXACTSPorts\FedEx\Fedex\Response;

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
        Version $version)
    {
        $this->webAuthenticationDetail = $webAuthenticationDetail; 
        $this->clientDetail = $clientDetail;
        $this->transactionDetail = $transactionDetail;
        $this->version = $version;
    } 

    /**
     * Converts object to array
     * @param $object
     * @return array
     */
    public function toArray($object)
    {
        $array = json_decode(json_encode($object), true);
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

    /**
     * Creates office order
     */
    public function createOfficeOrder(CreatefficeOrderInterface $createOfficeOrder) 
    {
        $client = new Client();
        $createOfficeOrderArray = $this->toArray($createOfficeOrder);
        
        try {
            $reponse = $client->createOfficeOrder($createOfficeOrderArray);
        catch (\SoapFault $exception) {
            
        }
    }   
}
