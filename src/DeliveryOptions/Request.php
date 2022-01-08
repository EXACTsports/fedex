<?php

namespace EXACTSports\FedEx\DeliveryOptions;

use JetBrains\PhpStorm\Pure;

class Request
{
    public DeliveryOptionsRequest $deliveryOptionsRequest;

    #[Pure]
    public function __construct()
    {
        $this->deliveryOptionsRequest = new DeliveryOptionsRequest();
    }
}
