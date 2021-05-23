<?php 

namespace EXACTSports\FedEx\LocationService; 

use EXACTSports\FedEx\Base\BaseClientDetail; 

class ClientDetail extends BaseClientDetail
{
    public string|null $accountNumber; 
    public string|null $meterNumber; 
    // Optional
    public string|null $meterInstance;
    public string|null $region;  
} 