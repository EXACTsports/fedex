<?php 

namespace EXACTSports\FedEx\Fedex;

use EXACTSPorts\FedEx\Client;

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
}