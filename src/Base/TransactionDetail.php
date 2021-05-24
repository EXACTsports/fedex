<?php 

namespace EXACTSports\FedEx\Base;

use EXACTSports\FedEx\Base\Localization;

class TransactionDetail
{
    public string|null $customerTransactionId; // create Office Order v1 using PHP pickup center search
    public Localization $localization;

    public function __construct()
    {
        $this->localization = new Localization();
    }
}