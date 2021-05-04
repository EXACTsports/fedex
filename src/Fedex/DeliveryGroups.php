<?php 

namespace EXACTSports\FedEx\Fedex;

use EXACTSports\FedEx\Fedex\DeliveryMethod;

class DeliveryGroups
{
    public string|null $name; // delivery group name
    public string|null $description; // delivery group description
    public DeliveryMethod $deliveryMethod; 

    public function __construct(DeliveryMethod $deliveryMethod)
    {
        $this->deliveryMethod = $deliveryMethod; 
    }
}