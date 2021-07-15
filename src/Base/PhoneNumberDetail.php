<?php 

namespace EXACTSports\FedEx\Base;

use EXACTSports\FedEx\Base\PhoneNumber;

class PhoneNumberDetail
{
    public PhoneNumber $phoneNumber;    // N - Object contains recipient’s phone number
    public string $usage = "PRIMARY";               // N - For phone number, PRIMARY usage is mandatory. Multiple PRIMARY phone numbers - SECONDARY

    public function __construct()
    {
        $this->phoneNumber = new PhoneNumber();
    }
}