<?php 

namespace EXACTSports\FedEx\Http\Livewire\PrintOptions;

use Livewire\Component; 

class PrintOption extends Component 
{
    public array $printOption = [];
    public string $index = ""; 
    public string $selectedText = "";
    protected $listeners = ["selectText"];
     
    public function mount(array $printOption = [], string $index = "")
    {
        $this->printOption = $printOption;
        $this->index = $index;

        // Options 
        foreach ($printOption["options"] as $key => $option) {
            if ($key != "withMenu") {
                $this->selectedText = $option;
            } else {
                foreach ($option as $menuOption) {
                    if (isset($menuOption["default"])) {
                        $this->selectedText = $menuOption["default"];
                    }
                }
            }

            break;
        }
    }
    
    /**
     * Selects text
     */
    public function selectText(string $text, string $productId)
    {
        if ($this->index === $productId) {
            $this->selectedText = $text;
        }
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