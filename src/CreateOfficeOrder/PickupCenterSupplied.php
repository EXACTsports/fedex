<?php 

namespace EXACTSports\FedEx\CreateOfficeOrder;

use EXACTSports\FedEx\FedExTrait; 
use EXACTSports\FedEx\Fedex\WebAuthenticationDetail; 
use EXACTSports\FedEx\Fedex\ClientDetail; 
use EXACTSports\FedEx\Fedex\TransactionDetail; 
use EXACTSports\FedEx\Fedex\Version; 
use EXACTSports\FedEx\Fedex\OrderRecipient; 
use EXACTSports\FedEx\CreateOfficeOrder\CreateOfficeOrderInterface;

class PickupCenterSupplied
    implements CreateOfficeOrderInterface
{
    use FedexTrait {
        FedexTrait::__construct as ___construct;
    } 

    public function __construct()
    {
        $webAuthenticationDetail = new WebAuthenticationDetail();
        $clientDetail = new ClientDetail();
        $transactionDetail = new TransactionDetail();
        $version = new Version();
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

    /**
     * Creates offices order
     */
    public function createOfficeOrder()
    {
        $this->createOfficeOrder($this);
    }
}