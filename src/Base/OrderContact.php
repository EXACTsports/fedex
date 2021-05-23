<?php 

namespace EXACTSports\FedEx\Base;

use EXACTSports\FedEx\Base\Contact;
use EXACTSports\FedEx\Base\Address;
use EXACTSports\FedEx\Base\DeliveryGroups;

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