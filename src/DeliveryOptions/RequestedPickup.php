<?php

namespace EXACTSports\FedEx\DeliveryOptions;

use JetBrains\PhpStorm\Pure;

class RequestedPickup
{
    public int $resultsRequested = 10;       // N - Number of FedEx supported pickup centers to be returned back to the client

    //  based on the postal code provided. If not provided, the first 5 centers will be returned by default
    public SearchRadius $searchRadius;  // N - Search radius criteria to determine the depth of search for postal code provided

    #[Pure]
    public function __construct()
    {
        $this->searchRadius = new SearchRadius();
    }
}
