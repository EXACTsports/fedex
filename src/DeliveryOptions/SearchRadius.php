<?php 

namespace EXACTSports\FedEx\DeliveryOptions;

class SearchRadius
{
    public int $value;      // N - Number of miles to be searched. If not specified, search operation will be performed across 200 miles from the postal code provided by default
    public string $unit;    // N - Unit of search radius, hardcoded to miles as per current implementation
}