<?php

namespace EXACTSports\FedEx;

use EXACTSports\FedEx\CreateOfficeOrder\PickupCenterSearched;

class CreateOfficeOrder
{
    public PickupCenterSearched $pickupCenterSearched;
    
    public function __construct(PickupCenterSearched $pickupCenterSearched)
    {
        $this->pickupCenterSearched = $pickupCenterSearched; 
    }
}
