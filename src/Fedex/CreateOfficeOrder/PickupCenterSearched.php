<?php 

namespace EXACTSports\FedEx\Fedex\CreateOfficeOrder;

use EXACTSports\FedEx\FedExTrait; 
use EXACTSports\FedEx\Fedex\WebAuthenticationDetail; 
use EXACTSports\FedEx\Fedex\ClientDetail; 
use EXACTSports\FedEx\Fedex\TransactionDetail; 
use EXACTSports\FedEx\Fedex\Version; 
use EXACTSports\FedEx\Fedex\RequestedOfficeOrder;
use EXACTSports\FedEx\Fedex\OrderPickupDetail;
use EXACTSports\FedEx\Fedex\AssociatedAccounts; 

class PickupCenterSearched 
{
    use FedexTrait {
        FedexTrait::__construct as ___construct;
    } 

    public RequestedOfficeOrder $requestedOfficeOrder; 

    public function __construct()
    {
        $webAuthenticationDetail = new WebAuthenticationDetail();
        $clientDetail = new ClientDetail();
        $transactionDetail = new TransactionDetail();
        $version = new Version();
    
        $this->___construct(
            $webAuthenticationDetail, 
            $clientDetail, 
            $transactionDetail, 
            $version, 
        );

        $this->requestedOfficeOrder = new RequestedOfficeOrder();
        $this->requestedOfficeOrder->orderContact->deliveryGroups->deliveryMethod->orderRecipient->orderPickupDetail = new OrderPickupDetail();
        $this->requestedOfficeOrder->officeOrderChargesPayment->payor->associatedAccounts = new AssociatedAccounts();
    }

    /**
     * Creates office order
     */
    public function createOfficeOrder()
    {
        return $this->makeRequest("createOfficeOrder", $this);
    }
}