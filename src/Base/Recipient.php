<?php

namespace EXACTSports\FedEx\Base;

use JetBrains\PhpStorm\Pure;

class Recipient
{
    public string | null $reference = '';     // N - User-provided unique recipient reference to be used to relate delivery charges in the response

    public Contact | null $contact = null;    // N - Recipient contact details

    public PickUpDelivery $pickUpDelivery;  // N - If pickUpDelivery is present then shipmentDelivery must not be present

    public array $productAssociations;      // N - Associates the product instance in a request with its recipient

    #[Pure]
    public function __construct()
    {
        $this->contact = new Contact();
        $this->pickUpDelivery = new PickupDelivery();
    }
}
