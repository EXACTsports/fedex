<?php 

namespace EXACTSports\FedEx\DeliveryOptions;

use EXACTSports\FedEx\DeliveryOptions\Address;
use EXACTSports\FedEx\DeliveryOptions\RequestedDeliveryTypes;

class Delivery 
{
    public string $deliveryReference = "";                      // N - Used to identify the delivery options request;
    public Address $address;                                    // Y - Delivery address. Must be provided when the shipment delivery option is requested for the order
    public string $holdUntilDate = "";                          // N - Date when delivery should be initiated. Format is yyyy-mm-dd
    public RequestedDeliveryTypes $requestedDeliveryTypes;      // N - An array of shipment or pickup options. If none, both the shipment and pickup options will be returned by default
    public array $productAssociations;                          // Y - Product association ID and product association quantity
    
    public function __construct()
    {
        $this->address = new Address();
        $this->requestedDeliveryTypes = new RequestedDeliveryTypes();
    }
}