<?php

namespace EXACTSports\FedEx\Http\Livewire;

use EXACTSports\FedEx\Http\Services\FedexService;
use Livewire\Component;

class Cart extends Component
{
    protected $listeners = ['cart'];
    public $documents = [];

    public function cart($documents = [])
    {
        $this->documents = $documents;
    }

    public function render()
    {
        return view('fedex::livewire.cart', $this->documents);
    }
}
