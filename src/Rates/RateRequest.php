<?php 

namespace EXACTSports\FedEx\Rates;

class RateRequest
{
    // public null|string $fedExAccountNumber = null;      // N - Customer's FedEx account number that can be used to pay for the order and for discounts  
    // public null|string $site = null;                    // N - The site through which the print order is being made
    public array $products = [];                        // Y - The product instance for the order containing either the catalogReference or contentAssociations objects
    public array $recipients = [];                      // N - Contains recipient details. Currently the API supports only one recipient per request
}
