<?php 

namespace EXACTSports\FedEx\Http\Livewire;

use Livewire\Component; 
use EXACTSports\FedEx\Http\Services\FedexService;

class PaymentInformation extends Component 
{
    public function render()
    {
        return view("fedex::livewire.payment_information");
    }
}