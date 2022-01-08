<?php

namespace EXACTSports\FedEx\DeliveryOptions;

class DeliveryOptionsRequest
{
    public array $products;     // Y - The product instance for the order containing either the catalogReference or contentAssociations objects

    public array $deliveries;   // Y - Contains the delivery request information
}
