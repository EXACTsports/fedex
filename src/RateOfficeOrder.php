<?php

namespace EXACTSports\FedEx;

use EXACTSports\FedEx\Fedex\RateOfficeOrder\PickupCenterSearched;
use EXACTSports\FedEx\Fedex\RateOfficeOrder\PickupCenterSupplied;
use EXACTSports\FedEx\Fedex\RateOfficeOrder\Shipment;

class RateOfficeOrder
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
