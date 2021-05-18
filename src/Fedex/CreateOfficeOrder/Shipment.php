<?php 

namespace EXACTSports\FedEx\CreateOfficeOrder;

use EXACTSports\FedEx\FedExTrait; 
use EXACTSports\FedEx\Fedex\WebAuthenticationDetail; 
use EXACTSports\FedEx\Fedex\ClientDetail; 
use EXACTSports\FedEx\Fedex\TransactionDetail; 
use EXACTSports\FedEx\Fedex\Version; 
use EXACTSports\FedEx\Fedex\OrderRecipient; 
use EXACTSports\FedEx\Fedex\Address; 
use EXACTSports\FedEx\Fedex\OrderShipmentDetail;
use EXACTSports\FedEx\Fedex\Interfaces\CreateOfficeOrderInterface;

class Shipment 
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
        $orderRecipient->address = new Address();
        $orderRecipient->orderShipmentDetail = new OrderShipmentDetail(); 

        $this->___construct(
            $webAuthenticationDetail, 
            $clientDetail, 
            $transactionDetail, 
            $version, 
            $orderRecipient
        );
    }

    /**
     * Creates office order
     */
    public function createOfficeOrder()
    {
        return $this->makeRequest("createOfficeOrder", $this);
    }
}