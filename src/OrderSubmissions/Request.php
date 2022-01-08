<?php

namespace EXACTSports\FedEx\OrderSubmissions;

class Request
{
    public OrderSubmissionRequest $orderSubmissionRequest;

    public function __construct()
    {
        $this->orderSubmissionRequest = new OrderSubmissionRequest();
    }
}
