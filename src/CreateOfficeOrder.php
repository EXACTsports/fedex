<?php

namespace EXACTSports\FedEx;

use EXACTSports\FedEx\CreateOfficeOrder\PickupCenterSearched;
use EXACTSports\FedEx\CreateOfficeOrder\PickupCenterSupplied;

class CreateOfficeOrder
{
    public PickupCenterSearched $pickupCenterSearched;
    public PickupCenterSupplied $pickupCenterSupplied;

    public function __construct(PickupCenterSearched $pickupCenterSearched, PickupCenterSupplied $pickupCenterSupplied)
    {
        $this->pickupCenterSearched = $pickupCenterSearched; 
        $this->pickupCenterSupplied = $pickupCenterSupplied; 
    }
}
