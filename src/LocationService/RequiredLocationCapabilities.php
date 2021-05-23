<?php 

namespace EXACTSports\FedEx\LocationService;

class RequiredLocationCapabilities
{
    public string|null $carrierCode;
    public string|null $serviceType;
    public string|null $serviceCategory;
    public string|null $transferOfPossesionType;
    public string|null $daysOfWeek;
}