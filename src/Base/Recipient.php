<?php 

namespace EXACTSports\FedEx\Base;

use EXACTSports\FedEx\Base\PickUpDelivery;
use EXACTSports\FedEx\Base\Contact;

class Recipient 
{
    public string|null $reference = null;   // N - User-provided unique recipient reference to be used to relate delivery charges in the response
    public string|null $attention = null;   
    public Contact|null $contact = null;      // N - Recipient contact details
    public PickUpDelivery $pickUpDelivery;  // N - If pickUpDelivery is present then shipmentDelivery must not be present
    public array $productAssociations;      // N - Associates the product instance in a request with its recipient

    public function __construct()
    {
        $this->pickUpDelivery = new PickupDelivery();
    }
}