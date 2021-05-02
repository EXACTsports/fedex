<?php 

namespace EXACTSports\FedEx\Fedex;

use EXACTSports\FedEx\Fedex\Contact;
use EXACTSports\FedEx\Fedex\Address;

class OrderContact
{
    private Contact $contact;
    private Address $address;  

    public function __construct(Contact $contact, Address $address)
    {
        $this->contact = $contact; 
        $this->address = $address;
    }
}