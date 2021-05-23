<?php 

namespace EXACTSports\FedEx\Base;

use EXACTSports\FedEx\Base\Contact;

class OrderRecipient
{
    public Contact $contact;

    public function __construct(Contact $contact = null)
    {
        if (is_null($contact)) {
            $contact = new Contact();
        }

        $this->contact = $contact;
    }

    public function __set($key, $value)
    {
        $this->$key = $value;
    }
}