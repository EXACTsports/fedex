<?php

namespace EXACTSports\FedEx\Rates;

class Request
{
    public RateRequest $rateRequest;

    public function __construct()
    {
        $this->rateRequest = new RateRequest();
    }
}
