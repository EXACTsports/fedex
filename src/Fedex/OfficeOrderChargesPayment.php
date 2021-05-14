<?php 

namespace EXACTSports\FedEx\Fedex;

use EXACTSports\FedEx\Fedex\Payor;

class OfficeOrderChargesPayment
{
    public string|null $paymentType = "ACCOUNT"; // as is
    public Payor $payor;

    public function __construct(Payor $payor = null)
    {
        if (is_null($payor)) {
            $payor = new Payor();
        }
        
        $this->payor = $payor;
    }
}