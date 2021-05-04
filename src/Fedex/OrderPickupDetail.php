<?php 

namespace EXACTSports\FedEx\Fedex;

use EXACTSports\FedEx\Fedex\LocationSearchCriteria;

class OrderPickupDetail
{
    public LocationSearchCriteria $locationSearchCriteria;
    public string|null $dueDateTime; // "YYYY-MM-DDTHH"; for example, 2010-05-28T21

    public function __construct(LocationSearchCriteria $locationSearchCriteria)
    {
        $this->locationSearchCriteria = $locationSearchCriteria;
    }
}
