<?php 

namespace EXACTSports\FedEx\DeliveryOptions;

use EXACTSports\FedEx\DeliveryOptions\SearchRadius;

class RequestedPickup
{
    public int $resultsRequested;       // N - Number of FedEx supported pickup centers to be returned back to the client
                                        //  based on the postal code provided. If not provided, the first 5 centers will be returned by default
    public SearchRadius $searchRadius;  // N - Search radius criteria to determine the depth of search for postal code provided
}