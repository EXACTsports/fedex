<?php

namespace EXACTSports\FedEx;

use EXACTSports\FedEx\CreateOfficeOrder\PickupCenterSearched;
use EXACTSports\FedEx\CreateOfficeOrder\PickupCenterSupplied;
use EXACTSports\FedEx\CreateOfficeOrder\Shipment;

class CreateOfficeOrder
{
    public PickupCenterSearched $pickupCenterSearched;
    public PickupCenterSupplied $pickupCenterSupplied;
    public Shipment $shipment;

    public function __construct(
        PickupCenterSearched $pickupCenterSearched, 
        PickupCenterSupplied $pickupCenterSupplied,
        Shipment $shipment
        )
    {
        $this->pickupCenterSearched = $pickupCenterSearched; 
        $this->pickupCenterSupplied = $pickupCenterSupplied; 
        $this->shipment = $shipment;
    }
}
