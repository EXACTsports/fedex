<?php

namespace EXACTSports\FedEx\Base;

use EXACTSports\FedEx\Base\Company;
use EXACTSports\FedEx\Base\EmailDetail;
use EXACTSports\FedEx\Base\PersonName;

class Contact
{
    public PersonName $personName;
    public Company $company;            // N - Recipient’s company details
    public EmailDetail $emailDetail;    // N - Contains recipient’s email address
    public array $phoneNumberDetails;

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
