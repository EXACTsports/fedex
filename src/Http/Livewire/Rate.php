<?php 

namespace EXACTSports\FedEx\Http\Livewire;

use Livewire\Component; 
use EXACTSports\FedEx\Http\Services\FedexService;

class Rate extends Component 
{
    public array $rate = [];
    public bool $showRatesInfo;
    protected $listeners = ["setRate"];

    /**
     * Set rate
     * @param array $rate
     */
    public function setRate(array $rate = [])
    {
        $this->showRatesInfo = true;
        $this->rate = $rate;
    }

    public function mount(bool $showRatesInfo)
    {
        $this->showRatesInfo = $showRatesInfo;
    }
    
    public function render()
    {
        return view("fedex::livewire.show_rate", ["rate" => $this->rate]);
    }
}
