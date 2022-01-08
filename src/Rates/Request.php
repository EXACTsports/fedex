<?php

namespace EXACTSports\FedEx\Rates;

use JetBrains\PhpStorm\Pure;

class Request
{
    public RateRequest $rateRequest;

    #[Pure]
    public function __construct()
    {
        $this->rateRequest = new RateRequest();
    }
}
