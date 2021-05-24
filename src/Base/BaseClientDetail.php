<?php 

namespace EXACTSports\FedEx\Base;

use EXACTSports\FedEx\Base\Localization;
use EXACTSports\FedEx\Base\Interfaces\ClientDetailInterface; 

class BaseClientDetail
    implements ClientDetailInterface
{
    public string|null $integratorId; // your integrator id
    public Localization $localization; 

    public function __construct()
    {
        $this->localization = new Localization();
    }
}