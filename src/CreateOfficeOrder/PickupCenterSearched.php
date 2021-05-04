<?php 

namespace EXACTSports\FedEx\CreateOfficeOrder;

use EXACTSports\FedEx\FedExTrait; 
use EXACTSports\FedEx\Fedex\WebAuthenticationDetail; 
use EXACTSports\FedEx\Fedex\ClientDetail; 
use EXACTSports\FedEx\Fedex\TransactionDetail; 
use EXACTSports\FedEx\Fedex\Version; 
use EXACTSports\FedEx\Fedex\RequestedOfficeOrder;
use EXACTSports\FedEx\Fedex\OrderPickupDetail;


class PickupCenterSearched 
{
    use FedexTrait {
        FedexTrait::__construct as ___construct;
    } 

    public OrderPickupDetail $orderPickupDetail;

    public function __construct(
        WebAuthenticationDetail $webAuthenticationDetail, 
        ClientDetail $clientDetail, 
        TransactionDetail $transactionDetail,
        Version $version,
        RequestedOfficeOrder $requestedOfficeOrder,
        OrderPickupDetail $orderPickupDetail)
    {
        $this->___construct($webAuthenticationDetail, $clientDetail, $transactionDetail, $version, $requestedOfficeOrder);
        $this->orderPickupDetail = $orderPickupDetail;
        $this->requestedOfficeOrder->orderContact->deliveryGroups->deliveryMethod->orderRecipient->orderPickupDetail = $this->orderPickupDetail;
    }
}