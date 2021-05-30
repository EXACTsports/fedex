<?php 

namespace EXACTSports\FedEx\Http\Livewire;

use Livewire\Component; 

class DatePicker extends Component 
{
    public string $label; 
    
    public function mount(string $label) 
    {
        $this->label = $label;
    }

    public function render()
    {
        return view("fedex::livewire.date_picker", ["label" => $this->label]);
    }
}
