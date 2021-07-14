<?php 

namespace EXACTSports\FedEx\DeliveryOptions;

class Address
{
    public array $streetLines;              // - N Street details of delivery address. This may contain address line 1 and address line 2
    public string $city;                    // - C Delivery city. Either postal code or city is required to determine the centers
    public string $stateOrProvinceCode;     // - N State code where delivery is requested
    public string $postalCode;              // - N Postal code of the delivery address. Either postal code or city is required to determine the centers
    public string $countryCode;             // - N Country where delivery is requested. Only US is supported per current implementation
    public string $addressClassification;   // - N Used to determine if the address is a residential or business address
}