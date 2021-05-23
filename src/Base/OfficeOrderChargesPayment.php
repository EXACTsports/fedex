<?php 

namespace EXACTSports\FedEx\Base;

use EXACTSports\FedEx\Base\Payor;

class OfficeOrderChargesPayment
{
    public string|null $paymentType = "ACCOUNT"; // as is
    public Payor $payor;

    public function __construct()
    {
        $this->payor = new Payor();
    }
}