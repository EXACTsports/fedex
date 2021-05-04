<?php 

namespace EXACTSports\FedEx\Fedex;

use EXACTSports\FedEx\Fedex\Contact;

class OrderRecipient
{
    public Contact $contact;
    
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function __set($key, $value)
    {
        $this->$key = $value;
    }
}