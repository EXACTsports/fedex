<?php 

namespace EXACTSports\FedEx\Http\Livewire;

use Livewire\Component; 
use EXACTSports\FedEx\Http\Services\FedexService;

class ContactInformation extends Component 
{
    public function render()
    {
        return view("fedex::livewire.contact_information");
    }
}
