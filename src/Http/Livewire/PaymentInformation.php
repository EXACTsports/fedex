<?php

namespace EXACTSports\FedEx\Http\Livewire;

use EXACTSports\FedEx\Http\Services\FedexService;
use Livewire\Component;

class PaymentInformation extends Component
{
    public string $nameOnCard = "";
    public string $cardNumber = "";
    public string $securityCode = "";
    public string $month = "";
    public string $year = "";

    protected $listeners = ["setPaymentInformation"];

    /**
     * Sets payment information
     */
    public function setPaymentInformation()
    {
        $paymentInformation = array(
            "nameOnCard" => $this->nameOnCard,
            "cardNumber" => $this->cardNumber,
            "securityCode" => $this->securityCode,
            "month" => $this->month,
            "year" => $this->year
        );

        $this->emit("placeOrder", $paymentInformation);
    }

    public function render()
    {
        return view('fedex::livewire.payment_information');
    }
}
