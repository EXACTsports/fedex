<?php 

namespace EXACTSports\FedEx\Fedex;

use EXACTSports\FedEx\Fedex\PersonName;

class Contact
{   
    public PersonName $personName; 
    public string|null $companyName; // contact company name
    public string|null $phoneNumber; // contact phone number
    public string|null $faxNumber; // contact fax number
    public string|null $eMailAddress; // contact email address

    public function __construct(PersonName $personName)
    {
        $this->personName = $personName;
    }
}