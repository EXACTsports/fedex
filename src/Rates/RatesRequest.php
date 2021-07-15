<?php 

namespace EXACTSports\FedEx\Rates;

use EXACTSports\FedEx\Rates\RateRequest;

class RatesRequest
{
    public RateRequest $rateRequest;

    public function __construct()
    {
        $this->rateRequest = new RateRequest();
    }
}
