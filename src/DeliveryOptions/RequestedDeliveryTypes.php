<?php

namespace EXACTSports\FedEx\DeliveryOptions;

use JetBrains\PhpStorm\Pure;

class RequestedDeliveryTypes
{
    public RequestedPickup $requestedPickup;

    #[Pure]
    public function __construct()
    {
        $this->requestedPickup = new RequestedPickup();
    }
}
