<?php

namespace EXACTSports\FedEx\OrderSubmissions;

use EXACTSports\FedEx\OrderSubmissions\OrderSubmissionRequest;

class Request
{
    public OrderSubmissionRequest $orderSubmissionRequest;

    public function __construct()
    {
        $this->orderSubmissionRequest = new OrderSubmissionRequest();
    }
}
