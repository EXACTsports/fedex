<?php 

namespace EXACTSports\FedEx\Base;

use EXACTSports\FedEx\Base\DeliveryMethod;
use EXACTSports\FedEx\Base\PrintLineItems;

class DeliveryGroups
{
    public string|null $name; // delivery group name
    public string|null $description; // delivery group description
    public DeliveryMethod $deliveryMethod; 
    public array $printLineItems = [];

    public function __construct()
    {
        $this->deliveryMethod = new DeliveryMethod();
    }
}