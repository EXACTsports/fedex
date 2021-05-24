<?php 

namespace EXACTSports\FedEx\LocationsService;

use EXACTSports\FedEx\LocationsService\Weight;
use EXACTSports\FedEx\LocationsService\Dimensions;

class PackageDetail
{
    public Weight $weight;
    public Dimensions $dimensions; 
    public string|null $serviceOptions;

    public function __construct()
    {
        $this->weight = new Weight;
        $this->dimensions = new Dimensions;
    }
}