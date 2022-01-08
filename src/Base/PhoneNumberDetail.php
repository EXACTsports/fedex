<?php

namespace EXACTSports\FedEx\Base;

use JetBrains\PhpStorm\Pure;

class PhoneNumberDetail
{
    public PhoneNumber $phoneNumber;    // Y - Contains the contact’s phone number details

    public string $usage = 'PRIMARY';   // N - For phone number, PRIMARY usage is mandatory. Multiple PRIMARY phone numbers - SECONDARY

    #[Pure]
    public function __construct()
    {
        $this->phoneNumber = new PhoneNumber();
    }
}
