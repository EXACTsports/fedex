<?php

namespace EXACTSports\FedEx;

use EXACTSports\FedEx\Fedex\WebAuthenticationDetail; 
use EXACTSports\FedEx\Fedex\ClientDetail; 
use EXACTSports\FedEx\Fedex\TransactionDetail; 
use EXACTSports\FedEx\Fedex\Version; 
use EXACTSports\FedEx\Fedex\RequestedOfficeOrder;

trait FedExTrait
{

    public WebAuthenticationDetail $webAuthenticationDetail; 
    public ClientDetail $clientDetail; 
    public TransactionDetail $transactionDetail; 
    public Version $version; 
    public RequestedOfficeOrder $requestedOfficeOrder;

    public function __construct(WebAuthenticationDetail $webAuthenticationDetail, ClientDetail $clientDetail, 
        TransactionDetail $transactionDetail,
        Version $version,
        RequestedOfficeOrder $requestedOfficeOrder)
    {
        $this->webAuthenticationDetail = $webAuthenticationDetail; 
        $this->clientDetail = $clientDetail;
        $this->version = $version;
        $this->requestedOfficeOrder = $requestedOfficeOrder;
    } 
}
