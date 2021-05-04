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

    public function __construct(Contact $contact, Address $address,
        DeliveryGroups $deliveryGroups)
    {
        $this->contact = $contact; 
        $this->address = $address;
        $this->deliveryGroups = $deliveryGroups;
    }
}