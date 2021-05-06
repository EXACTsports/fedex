<?php 

namespace EXACTSports\FedEx\Fedex;

use EXACTSports\FedEx\Fedex\DeliveryMethod;
use EXACTSports\FedEx\Fedex\PrintLineItems;

class DeliveryGroups
{
    public string|null $name; // delivery group name
    public string|null $description; // delivery group description
    public DeliveryMethod $deliveryMethod; 
    public PrintLineItems|array $printLineItems = [];
    

    public function __construct(DeliveryMethod $deliveryMethod)
    {
        $this->deliveryMethod = $deliveryMethod; 
    }
}