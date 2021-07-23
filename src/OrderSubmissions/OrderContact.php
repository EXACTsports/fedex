<?php

namespace EXACTSports\FedEx\OrderSubmissions;

use EXACTSports\FedEx\Base\Contact;

class OrderContact
{
    public Contact $contact; // Y - Contains the information of the contact person placing the order

    public function __construct()
    {
        $this->contact = new Contact();    
    }
}