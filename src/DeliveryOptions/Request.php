<?php 

namespace EXACTSports\FedEx\DeliveryOptions;

use EXACTSports\FedEx\DeliveryOptions\DeliveryOptionsRequest;

class Request
{
    public DeliveryOptionsRequest $deliveryOptionsRequest;
    
    public function __construct()
    {
        $this->deliveryOptionsRequest = new DeliveryOptionsRequest();
    }
}