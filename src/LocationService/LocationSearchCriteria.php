<?php 

namespace EXACTSports\FedEx\Base\LocationService;

class LocationSearchCriteria 
{
    public string|null $streetLines; // center street address
    public string|null $city; // center city
    public string|null $stateOrProvinceCode; // center state
    public string|null $postalCode; // center postal code
    public string|null $countryCode; // center country code
    public bool|null $residential = false;
}
   