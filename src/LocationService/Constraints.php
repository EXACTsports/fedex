<?php 

namespace EXACTSports\FedEx\LocationService;

use EXACTSports\FedEx\LocationService\RadiusDistance;

class Constraints 
{
    public RadiusDistance $radiusDistance;
    public string|null $dropOffTimeNeeded; 
    public array $resultsFilters;
    public string|null $supportedRedirectToHoldServices;
    public array $requiredLocationAttributes;
}