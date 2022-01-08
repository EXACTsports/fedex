<?php

namespace EXACTSports\FedEx\OrderSubmissions;

use EXACTSports\FedEx\Base\Contact;

class BillingAddress
{
    public Contact $contact;

    public function __construct()
    {
        $this->contact = new Contact();
    }
}
