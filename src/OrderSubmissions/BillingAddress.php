<?php

namespace EXACTSports\FedEx\OrderSubmissions;

use EXACTSports\FedEx\Base\Contact;
use JetBrains\PhpStorm\Pure;

class BillingAddress
{
    public Contact $contact;

    public ?string $stateOrProvinceCode;

    public ?string $postalCode;

    public ?string $countryCode;

    public ?string $city;

    public ?array $streetLines;

    #[Pure]
    public function __construct()
    {
        $this->contact = new Contact();
    }
}
