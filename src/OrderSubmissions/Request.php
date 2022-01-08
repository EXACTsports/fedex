<?php

namespace EXACTSports\FedEx\OrderSubmissions;

use JetBrains\PhpStorm\Pure;

class Request
{
    public OrderSubmissionRequest $orderSubmissionRequest;

    #[Pure]
    public function __construct()
    {
        $this->orderSubmissionRequest = new OrderSubmissionRequest();
    }
}
