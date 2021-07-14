<?php 

namespace EXACTSports\FedEx\DeliveryOptions;

use EXACTSports\FedEx\DeliveryOptions\RequestedPickup;

class DeliveryRequestedPickup
{
    public RequestedPickup $requestedPickup;

    public function __construct()
    {
        $requestedPickup = new RequestedPickup();
    }
}
