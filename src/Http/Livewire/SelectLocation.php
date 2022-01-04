<?php

namespace EXACTSports\FedEx\Http\Livewire;

use EXACTSports\FedEx\Http\Services\FedexService;
use Livewire\Component;

class SelectLocation extends Component
{
    public string $distance = '5-Miles';
    public string $address = '';
    public string $locationId = '';

    protected $listeners = ['searchLocations', 'setLocationId', 'goToContactInformation'];

    /**
     * Search locations.
     */
    public function searchLocations()
    {
        $this->emit('fetchLocations', $this->distance, $this->address);
    }

    /**
     * Sets locations id.
     */
    public function setLocationId(string $locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * Goes to contact information.
     */
    public function goToContactInformation()
    {
        $this->emit('showContactInformationForm', $this->locationId);
    }

    public function render()
    {
        return view('fedex::livewire.select_location');
    }
}
