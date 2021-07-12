<?php 

namespace EXACTSports\FedEx\Base;

use EXACTSports\FedEx\Base\PickUpDelivery;

class Recipient 
{
    public string|null $reference = null;   // N - User-provided unique recipient reference to be used to relate delivery charges in the response
    public array|null $contact = null;      // N - Recipient contact details
    public array $productAssociations;      // N - Associates the product instance in a request with its recipient
    public PickUpDelivery $pickUpDelivery;  // N - If pickUpDelivery is present then shipmentDelivery must not be present

    public function __construct()
    {
        $this->pickUpDelivery = new PickupDelivery();
    }
}