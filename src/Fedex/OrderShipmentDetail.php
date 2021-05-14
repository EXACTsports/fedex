<?php 

namespace EXACTSports\FedEx\Fedex;

use EXACTSports\FedEx\Fedex\ShippingChargesPayment;

class OrderShipmentDetail
{
    public ShippingChargesPayment $shippingChargesPayment;
    public string|null $serviceType; // service type e.g, FIRST_OVERNIGHT

    public function __construct(ShippingChargesPayment $shippingChargesPayment = null)
    {
        if (is_null($shippingChargesPayment)) {
            $shippingChargesPayment = new ShippingChargesPayment();
        }

        $this->shippingChargesPayment = $shippingChargesPayment;
    }
}