<?php 

namespace EXACTSports\FedEx\Base;

use EXACTSports\FedEx\Base\OrderRecipient;

class DeliveryMethod
{
    public string|null $deliveryType = "PICKUP"; //as is
    public OrderRecipient $orderRecipient;

    public function __construct()
    {
        $this->orderRecipient = new OrderRecipient();
    }
}