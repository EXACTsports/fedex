<?php

namespace EXACTSports\FedEx\Http\Livewire;

use EXACTSports\FedEx\Http\Services\FedexService;
use Livewire\Component;

class PaymentInformation extends Component
{
    public function render()
    {
        return view('fedex::livewire.payment_information');
    }
}
