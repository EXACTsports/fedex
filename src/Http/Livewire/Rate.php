<?php 

namespace EXACTSports\FedEx\Http\Livewire;

use Livewire\Component; 
use EXACTSports\FedEx\Http\Services\FedExService;

class Rate extends Component 
{
    public array $rateDetails  = [];
    public bool $showRatesInfo;
    protected $listeners = ["setRates"];

    /**
     * Set rate
     * @param array $rate
     */
    public function setRates(array $rateDetails = [])
    {
        $this->showRatesInfo = true;
        $this->rateDetails = $rateDetails;
    }

    public function render()
    {
        return view("fedex::livewire.rate");
    }
}
