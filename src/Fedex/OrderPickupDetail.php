<?php 

namespace EXACTSports\FedEx\Fedex;

use EXACTSports\FedEx\Fedex\LocationSearchCriteria;

class OrderPickupDetail
{
    public LocationSearchCriteria $locationSearchCriteria;
    public string|null $dueDateTime; // "YYYY-MM-DDTHH"; for example, 2010-05-28T21

    public function __construct(LocationSearchCriteria $locationSearchCriteria = null)
    {
        if (is_null($locationSearchCriteria)) {
            $locationSearchCriteria = new LocationSearchCriteria();
        }

        $this->locationSearchCriteria = $locationSearchCriteria;
    }
}
