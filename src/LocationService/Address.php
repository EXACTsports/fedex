<?php 

namespace EXACTSports\FedEx\LocationService; 

use EXACTSports\FedEx\Base\BaseAddress;

class Address extends BaseAddress
{
    public string|null $urbanizationCode;
    public string|null $countryName;
    public string|null $geograpicCoordinates;
}