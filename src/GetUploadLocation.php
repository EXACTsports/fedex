<?php

namespace EXACTSports\FedEx;

use EXACTSports\FedEx\FedExTrait; 
use EXACTSports\FedEx\Fedex\WebAuthenticationDetail; 
use EXACTSports\FedEx\Fedex\ClientDetail; 
use EXACTSports\FedEx\Fedex\TransactionDetail; 
use EXACTSports\FedEx\Fedex\Version; 

class GetUploadLocation
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

         $this->___construct(
            $webAuthenticationDetail, 
            $clientDetail, 
            $transactionDetail, 
            $version, 
        );
    }
}
