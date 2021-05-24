<?php 

namespace EXACTSports\FedEx\Base;

class BaseAddress
{
    public array $streetLines; // contact street address
    public string|null $city; // contact city
    public string|null $stateOrProvinceCode; // contact state
    public string|null $postalCode; // contact postal code
    public string|null $countryCode; // contact contry code
    public string|null $residential; // contact residential
}