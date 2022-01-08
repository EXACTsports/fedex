<?php

namespace EXACTSports\FedEx\OrderSubmissions;

use JetBrains\PhpStorm\Pure;

class OrderSubmissionRequest
{
    public string $fedexAccountNumber = '';                     // N - FedEx account number to be used to pay for the order.

    //  If provided with a credit card under payment, this account number will be used to calculate and
                                                                //  apply discounts only
    public string $site = '';                                   // N - The site through which the print order is being made

                                                                //  Only valid and authenticated users for the requested site will be allowed to successfully submit an order
    public OrderContact $orderContact;                          // Y - Contains details about the person placing the order

    public array $products = [];                                // Y - The product instance for the order containing either the catalogReference or contentAssociations objects

    public array $recipients = [];                              // Y - Contains recipient details. Currently the API supports only one recipient per request

    public array $payments = [];                                // Y - Contains the payment information for the order

    public NotificationRegistration $notificationRegistration;  // N - Contains the webhook information for any notifications

    #[Pure]
    public function __construct()
    {
        $this->orderContact = new OrderContact();
        $this->notificationRegistration = new NotificationRegistration();
    }
}
