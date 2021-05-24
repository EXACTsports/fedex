<?php 

namespace EXACTSports\FedEx\LocationsService;

use EXACTSports\FedEx\LocationsService\RadiusDistance;
use EXACTSports\FedEx\LocationsService\ShipmentDetail;

class Constraints 
{
    public RadiusDistance $radiusDistance;
    public string|null $dropOffTimeNeeded; 
    public array $resultsFilters;
    public array $supportedRedirectToHoldServices;
    public array $requiredLocationAttributes;
    public string|null $resultsToSkip;
    public int|null $resultsRequested;
    public array $locationContentOptions;
    public array $locationTypesToInclude;

    public function __construct()
    {
        $this->radiusDistance = new RadiusDistance();
    }
}