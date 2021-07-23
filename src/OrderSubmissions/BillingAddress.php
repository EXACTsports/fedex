<?php

namespace EXACTSports\FedEx\OrderSubmissions;

use EXACTSports\FedEx\Base\Address;

class OrderContact
{
    public Contact $contact; 

    public function __construct()
    {
        $this->contact = new Contact();    
    }
}