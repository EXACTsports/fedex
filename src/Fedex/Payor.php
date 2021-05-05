<?php 

namespace EXACTSports\FedEx\Fedex;

use EXACTSports\FedEx\Fedex\AssociatedAccounts;

class Payor
{
    public AssociatedAccounts $associatedAccounts;
    
    public function __construct(AssociatedAccounts $associatedAccounts)
    {
        $this->associatedAccounts = $associatedAccounts;
    }
}