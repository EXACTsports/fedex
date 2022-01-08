<?php

namespace EXACTSports\FedEx\OrderSubmissions;

use JetBrains\PhpStorm\Pure;

class Payment
{
    public string $poNumber;            // N - Purchase Order number

    // Customer-provided reference number for the order to be used for billing purposes
    public array $billingFields = [];   // N - Additional billing fields used for reporting

    public Invoice $invoice;            // N - Contains the information for payment by invoice

    public CreditCard $creditCard;      // Y - Contains the credit card information to be used for payment

    #[Pure]
    public function __construct()
    {
        $this->creditCard = new CreditCard();
    }
}
