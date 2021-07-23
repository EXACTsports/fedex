<?php

namespace EXACTSports\FedEx\Base;

use EXACTSports\FedEx\Base\Company;
use EXACTSports\FedEx\Base\EmailDetail;
use EXACTSports\FedEx\Base\PersonName;

class Contact
{
    public PersonName $personName;      // Y - Contains the first name and last name of the contact person
    public Company $company;            // N - Contains the company name of the contact
    public EmailDetail $emailDetail;    // Y - Contains the email address of the contact
    public array $phoneNumberDetails;   // Y - Contains the phone number details of the contact

    public function __construct(
        PersonName $personName = null,
        Company $company = null,
        EmailDetail $emailDetail = null
    ) {
        if (is_null($personName)) {
            $personName = new PersonName();
        }

        if (is_null($company)) {
            $company = new Company();
        }

        if (is_null($emailDetail)) {
            $emailDetail = new EmailDetail();
        }

        $this->personName = $personName;
        $this->company = $company;
        $this->emailDetail = $emailDetail;
    }
}
