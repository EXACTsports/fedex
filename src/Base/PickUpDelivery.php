<?php

namespace EXACTSports\FedEx\Base;

use JetBrains\PhpStorm\Pure;

class PickUpDelivery
{
    public string | null $requestedPickupLocalTime = ''; // N - When present, must be in the format yyyy-mm-ddThh:MM:ss. Requested time for pickup of an order, uses local time

    public Location | string $location;

    #[Pure]
    public function __construct()
    {
        $this->location = new Location();
    }
}
