<?php 

namespace EXACTSports\FedEx\Http\Livewire;

use Livewire\Component; 
use EXACTSports\FedEx\Http\Services\FedexService;

class Locations extends Component 
{
    public array $locations = [];
    protected $listeners = ["setLocations"];

    /**
     * Set locations
     * @param array $locations
     */
    public function setLocations(array $locations = [])
    {
        $this->locations = $locations;
    }
    
    public function render()
    {
        return view("fedex::livewire.locations", ["locations" => $this->locations]);
    }
}
