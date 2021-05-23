<?php 

namespace EXACTSports\FedEx\Base;

use EXACTSports\FedEx\Client;

class Response 
{  
    public Client $client;

    public function __construc(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Gets last request
     */
    public function getLastRequest()
    {
        return $this->client->__getLastRequest();
    }

    /**
     * Gets last response
     */
    public function getLastResponse()
    {
        return $this->client->__getLastResponse();
    }

    /**
     * Return success array
     */
    public function success()
    {
        return array(
            "lastRequest" => $this->getLastRequest(),
            "lastResponse" => $this->getLastResponse()
        );
    } 

    /**
     * Returns failures
     */
    public function failure($response)
    {
        $notifications = [];

        foreach ($response->Notifications as $notification) {
            $notificationArray = array(
                "severity" => $notification->Severity,
                "message" => $notification->Message
            );
            
            $notifications[] = $notificationArray; 
        }
        
        return $notifications;
    }

    /**
     * Failure
     */
    public function exception($exception, $client)
    {
        return array(                     
            "code" => $exception->faultcode, 
            "message" => $exception->faultstring
        );
    }
}