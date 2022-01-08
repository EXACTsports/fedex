<?php

namespace EXACTSports\FedEx\OrderSubmissions;

use EXACTSports\FedEx\Base\Contact;
use JetBrains\PhpStorm\Pure;

class OrderContact
{
    public Contact $contact; // Y - Contains the information of the contact person placing the order

    #[Pure]
    public function __construct()
    {
        $this->contact = new Contact();
    }
}
