<?php 

namespace EXACTSports\FedEx\Base;

use EXACTSports\FedEx\Base\OrderContact;
use EXACTSports\FedEx\Base\DeliveryGroups;
use EXACTSports\FedEx\Base\DeliveryMethod;
use EXACTSports\FedEx\Base\OrderRecipient;
use EXACTSports\FedEx\Base\OfficeOrderChargesPayment;
use EXACTSports\FedEx\Base\AssociatedAccounts;
use EXACTSports\FedEx\Base\Payor;
use EXACTSports\FedEx\Base\CustomerReferences;

class RequestedOfficeOrder
{
    public OrderContact $orderContact; 
    public OfficeOrderChargesPayment $officeOrderChargesPayment;
    public string|null $orderConfirmationEmailRequested = "true"; // order confirmation email requested
    public string|null $orderCompletionEmailRequested = "true"; // order completion email requested
    public string|null $orderNotificationCCEmailAddresses; // cc email address for order notification
    public string|null $orderNotificationBCCEmailAddresses; // bcc email address for order notification
    public CustomerReferences $customerReferences;

    public function __construct()
    {
        $this->orderContact = new OrderContact();      
        $this->officeOrderChargesPayment = new OfficeOrderChargesPayment();
        $this->customerReferences = new CustomerReferences();
    }
}