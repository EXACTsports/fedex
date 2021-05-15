<?php 

namespace EXACTSports\FedEx\Fedex;

use EXACTSports\FedEx\Fedex\OrderContact;
use EXACTSports\FedEx\Fedex\DeliveryGroups;
use EXACTSports\FedEx\Fedex\DeliveryMethod;
use EXACTSports\FedEx\Fedex\OrderRecipient;
use EXACTSports\FedEx\Fedex\OfficeOrderChargesPayment;
use EXACTSports\FedEx\Fedex\AssociatedAccounts;
use EXACTSports\FedEx\Fedex\Payor;
use EXACTSports\FedEx\Fedex\CustomerReferences;

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