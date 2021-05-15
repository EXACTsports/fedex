<?php 

namespace EXACTSports\FedEx\Fedex;

use EXACTSports\FedEx\Fedex\Contact;
use EXACTSports\FedEx\Fedex\Address;
use EXACTSports\FedEx\Fedex\DeliveryGroups;

class OrderContact
{
    public Contact $contact;
    public Address $address;
    public DeliveryGroups $deliveryGroups;  

    public function __construct()
    {
        $this->contact = new Contact(); 
        $this->address = new Address();
        $this->deliveryGroups = new DeliveryGroups();
    }
}