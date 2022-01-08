<?php

namespace EXACTSports\FedEx\DeliveryOptions;

class Request
{
    public DeliveryOptionsRequest $deliveryOptionsRequest;

    public function __construct()
    {
        $this->deliveryOptionsRequest = new DeliveryOptionsRequest();
    }
}
