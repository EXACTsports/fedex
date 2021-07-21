<?php

namespace EXACTSports\FedEx\Http\Livewire;

use EXACTSports\FedEx\Http\Services\FedexService;
use Livewire\Component;

class Locations extends Component
{
    public array $locations = [];
    protected $listeners = ['setLocations'];

    /**
     * Set locations.
     * @param array $locations
     */
    public function setLocations(array $locations = [])
    {
        $this->locations = $locations;
    }

    public function render()
    {
        return view('fedex::livewire.locations', ['locations' => $this->locations]);
    }
}
