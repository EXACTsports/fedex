<?php

namespace EXACTSports\FedEx\OrderSubmissions;

class CreditCard
{
    public bool $siteProvided = false;                          // N - Refers to the card on file that is set up to pay for orders

    //  Note: If there is a manually entered credit card in the request, this value must be false
    public string $type;                                        // Y - Type of credit card. VISA, MASTERCARD, DISCOVER, DINERS_CLUB AMERICAN_ EXPRESS

    public string $encryptedCreditCard;                         // N - Encrypted value of credit card number, including expiration month, expiration year, and cvv

    public string $expirationMonth;                             // Y - The credit card expiration month can be the abbreviated 3-character month name, full month name, 1-digit month number, or 2-digit month number (ex. Jan, January, 1, 01)

    public string $expirationYear;                              // Y - Credit card expiration year must be greater than or equal to current year

    public string $cardHolderName;                              // Y - Name on the credit card

    public BillingAddress $billingAddress;                      // Y - Contains billing address details for the credit card

    //  If siteprovided flag is false, billingAddress must be present in request
    public NotificationRegistration $notificationRegistration;  // N - Contains the webhook information for any notifications

    public function __construct()
    {
        $this->billingAddress = new BillingAddress();
    }
}
