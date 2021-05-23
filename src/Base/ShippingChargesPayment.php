<?php 

namespace EXACTSports\FedEx\Base;

use EXACTSports\FedEx\Base\Payor;

class ShippingChargesPayment
{
    public string|null $paymentType = "RECIPIENT"; // as is
    public Payor $payor;
     
    public function __construct()
    {
        $this->payor = new Payor();
        $this->payor->accountNumber = "";
    }
}