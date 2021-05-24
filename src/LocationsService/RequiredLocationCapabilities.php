<?php 

namespace EXACTSports\FedEx\LocationsService;

class RequiredLocationCapabilities
{
    public string|null $carrierCode;
    public string|null $serviceType;
    public string|null $serviceCategory;
    public string|null $transferOfPossesionType;
    public array $daysOfWeek;
}