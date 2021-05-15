<?php 

namespace EXACTSports\FedEx\Fedex;

use EXACTSports\FedEx\Fedex\OrderRecipient;

class DeliveryMethod
{
    public string|null $deliveryType = "PICKUP"; //as is
    public OrderRecipient $orderRecipient;

    public function __construct()
    {
        $this->orderRecipient = new OrderRecipient();
    }
}