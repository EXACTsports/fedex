<?php 

namespace EXACTSports\FedEx\DeliveryOptions;

use EXACTSports\FedEx\DeliveryOptions\DeliveryOptionsRequest;
use EXACTSports\FedEx\Rates\RateRequest;

class Request
{
    public DeliveryOptionsRequest $deliveryOptionsRequest;
    public RateRequest $rateRequest;

    public function __construct( string $typeRequest )
    {
        if ($typeRequest == 'deliveryOptions') {
            $this->deliveryOptionsRequest = new DeliveryOptionsRequest();
        }

        if ($typeRequest == 'rates') {
            $this->rateRequest = new RateRequest();
        }
    }
}