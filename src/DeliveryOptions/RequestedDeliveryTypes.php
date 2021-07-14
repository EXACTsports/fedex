<?php 

namespace EXACTSports\FedEx\DeliveryOptions;

use EXACTSports\FedEx\DeliveryOptions\RequestedPickup;

class RequestedDeliveryTypes
{
    public RequestedPickup $requestedPickup;
    
    public function __construct()
    {
        $this->requestedPickup = new RequestedPickup();
    }
}