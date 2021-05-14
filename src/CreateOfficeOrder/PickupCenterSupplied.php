<?php 

namespace EXACTSports\FedEx\CreateOfficeOrder;

use EXACTSports\FedEx\FedExTrait; 
use EXACTSports\FedEx\Fedex\WebAuthenticationDetail; 
use EXACTSports\FedEx\Fedex\ClientDetail; 
use EXACTSports\FedEx\Fedex\TransactionDetail; 
use EXACTSports\FedEx\Fedex\Version; 
use EXACTSports\FedEx\Fedex\OrderRecipient; 

class PickupCenterSupplied
{
    use FedexTrait {
        FedexTrait::__construct as ___construct;
    } 

    public function __construct(
        WebAuthenticationDetail $webAuthenticationDetail, 
        ClientDetail $clientDetail, 
        TransactionDetail $transactionDetail,
        Version $version)
    {

        $orderRecipient = new OrderRecipient();
        $orderRecipient->centerId = "";

        $this->___construct(
            $webAuthenticationDetail, 
            $clientDetail, 
            $transactionDetail, 
            $version, 
            $orderRecipient
        );
    }
}