<?php 

namespace EXACTSports\FedEx\Fedex;

use EXACTSports\FedEx\Fedex\OrderContact;

class RequestedOfficeOrder
{
    public OrderContact $orderContact; 

    public function __construct(OrderContact $orderContact)
    {
        $this->orderContact = $orderContact;
    }
}