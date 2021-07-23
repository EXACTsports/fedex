<?php

namespace EXACTSports\FedEx\Http\Livewire;

use EXACTSports\FedEx\Http\Services\FedexService;
use Livewire\Component;

class ContactInformation extends Component
{
    public string $firstName = "";
    public string $lastName = "";
    public string $company = "";
    public string $phone = "";
    public string $phoneExt = "";
    public string $alternatePhone = "";
    public string $altPhoneExt = "";
    public string $email = "";

    protected $listeners = ["setContactInformation"];

    /**
     * Sets contact information
     */
    public function setContactInformation()
    {
        $contactInformation = array(
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "company" => $this->company,
            "phone" => $this->phone,
            "phoneExt" => $this->phoneExt,
            "alternatePhone" => $this->alternatePhone,
            "altPhoneExt" => $this->altPhoneExt,
            "email" => $this->email
        );

        $this->emit("goToPaymentInformation", $contactInformation);
    }

    public function render()
    {
        return view('fedex::livewire.contact_information');
    }
}
