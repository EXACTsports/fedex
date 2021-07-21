<?php

namespace EXACTSports\FedEx\Http\Livewire;

use EXACTSports\FedEx\Http\Services\FedexService;
use Livewire\Component;

class ContactInformation extends Component
{
    public bool $showContactInformation = false;

    public function render()
    {
        return view('fedex::livewire.contact_information');
    }
}
