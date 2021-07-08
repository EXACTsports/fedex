<?php 

namespace EXACTSports\FedEx\Http\Livewire\PrintOptions;

use Livewire\Component; 

class PrintOption extends Component 
{
    public array $printOption = [];
    public int $index = 0; 

    public function mount(array $printOption = [], int $index = 0)
    {
        $this->printOption = $printOption;
        $this->index = $index;
    }
    
    public function render()
    {
        return view("fedex::livewire.print_options.print_option",
            [
                "printOption" => $this->printOption, 
                "index" => $this->index
            ]
        );
    }
}