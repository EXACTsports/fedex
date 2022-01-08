<?php

namespace EXACTSports\FedEx\DeliveryOptions;

class RequestedDeliveryTypes
{
    public RequestedPickup $requestedPickup;

    public function __construct()
    {
        $this->requestedPickup = new RequestedPickup();
    }
}
