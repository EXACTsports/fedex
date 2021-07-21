<?php

namespace EXACTSports\FedEx\Http\Livewire;

use EXACTSports\FedEx\Http\Services\FedexService;
use Livewire\Component;

class SelectLocation extends Component
{
    public string $distance = '5-Miles';
    public string $address = '';

    public function render()
    {
        return view('fedex::livewire.select_location',
            [
                'distance' => $this->distance,
                'address' => $this->address,
            ]
        );
    }
}
