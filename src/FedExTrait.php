<?php

namespace EXACTSports\FedEx;

use EXACTSports\FedEx\Base\Interfaces\WebAuthenticationDetailInterface;
use EXACTSports\FedEx\Base\Interfaces\ClientDetailInterface; 
use EXACTSports\FedEx\Base\TransactionDetail; 
use EXACTSports\FedEx\Base\Version;
use EXACTSports\FedEx\Base\RequestedOfficeOrder;
use EXACTSports\FedEx\Base\OrderRecipient; 
use EXACTSports\FedEx\Client;
use EXACTSports\FedEx\Base\Response;

trait FedExTrait
{
    public WebAuthenticationDetailInterface $webAuthenticationDetail; 
    public ClientDetailInterface $clientDetail; 
    public TransactionDetail $transactionDetail; 
    public Version $version; 
    public RequestedOfficeOrder $requestedOfficeOrder;
    
    public function __construct(
        WebAuthenticationDetailInterface $webAuthenticationDetail, 
        ClientDetailInterface $clientDetail, 
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
     * Makes request
     */
    public function makeRequest($method, $officeOrder) 
    {
        $officeOrderArray = $this->toArray($officeOrder);
        $client = new Client();   
        $soapResponse = new Response($client);

        try {
            $response = call_user_func(array($client, $method), $officeOrderArray); 
        } catch (\SoapFault $exception) {
            return $soapResponse->exception($exception, $client);
        }

        if ($soapResponse->HighestSeverity != 'FAILURE' && $soapResponse->HighestSeverity != 'ERROR') {
            return $soapResponse->success();
        } else {
            return $soapResponse->failure();
        }
    }
}
