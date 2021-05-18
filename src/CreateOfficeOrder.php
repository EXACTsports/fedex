<?php

namespace EXACTSports\FedEx;

use EXACTSports\FedEx\Fedex\CreateOfficeOrder\PickupCenterSearched;
use EXACTSports\FedEx\Fedex\CreateOfficeOrder\PickupCenterSupplied;
use EXACTSports\FedEx\Fedex\CreateOfficeOrder\Shipment;

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
