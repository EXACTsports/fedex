<?php 

namespace EXACTSports\FedEx\Fedex;

use EXACTSports\FedEx\Fedex\Payor;

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