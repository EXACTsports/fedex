<?php

namespace EXACTSports\FedEx\Http\Livewire;

use EXACTSports\FedEx\Http\Services\FedExService;
use Livewire\Component;

class Rate extends Component
{
    public array $rateDetails = [];
    public bool $showRatesInfo;
    protected $listeners = ['setRates'];    
    public array $documents = [];

    /**
     * Set rate.
     * @param array $rate
     */
    public function setRates(array $rateDetails = [])
    {
        $this->showRatesInfo = true;
        $this->rateDetails = $rateDetails;
    }

    public function render()
    {
        return view('fedex::livewire.rate');
    }
}
