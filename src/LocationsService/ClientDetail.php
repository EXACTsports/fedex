<?php 

namespace EXACTSports\FedEx\LocationsService; 

use EXACTSports\FedEx\Base\BaseClientDetail; 

class ClientDetail extends BaseClientDetail
{
    public string|null $accountNumber; 
    public string|null $meterNumber; 
    // Optional
    public string|null $meterInstance;
    public string|null $region;  

    public function __construct()
    {
        parent::__construct();
    }
} 