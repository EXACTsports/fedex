<?php 

namespace EXACTSports\FedEx\Http\Livewire;

use Livewire\Component; 
use EXACTSports\FedEx\Http\Services\FedexService;

class ContactInformation extends Component 
{
    public bool $showContactInformation = false; 

    public function mount(bool $showContactInformation)
    {
        $this->showContactInformation = $showContactInformation;
    }

    public function render()
    {
        return view("fedex::livewire.contact_information");
    }
}
