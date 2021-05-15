<?php

namespace EXACTSports\FedEx;

use EXACTSports\FedEx\CreateOfficeOrder\PickupCenterSearched;
use EXACTSports\FedEx\CreateOfficeOrder\PickupCenterSupplied;
use EXACTSports\FedEx\CreateOfficeOrder\Shipment;

class CreateOfficeOrder
{
    /**
     * Gets pickup center searched object
     */
    public function pickupCenterSearched()
    {
        return new PickupCenterSearched(); 
    }

    /**
     * Gets pickup center supplied object
     */
    public function pickupCenterSupplier()
    {
        return new PickupCenterSupplier();
    }

    /**
     * Gets shipment object
     */
    public function shipment()
    {
        return new Shipment();
    }
}
