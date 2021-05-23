<?php 

namespace EXACTSports\FedEx\CreateOfficeOrder;

use EXACTSports\FedEx\FedExTrait; 
use EXACTSports\FedEx\Fedex\WebAuthenticationDetail; 
use EXACTSports\FedEx\Fedex\ClientDetail; 
use EXACTSports\FedEx\Fedex\TransactionDetail; 
use EXACTSports\FedEx\Fedex\Version; 
use EXACTSports\FedEx\Fedex\OrderRecipient; 
use EXACTSports\FedEx\Fedex\Interfaces\RateOfficeOrderInterface;

class PickupCenterSupplied
    implements RateOfficeOrderInterface
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
     * Rates office interface
     */
    public function rateOfficeOrder()
    {
        return $this->makeRequest("rateOfficeOrder", $this);
    }
}