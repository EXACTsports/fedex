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

        foreach ($printOption["options"] as $option) {
            $this->selectedText = $option;
            break;
        }
    }

    /**
     * Selects print option
     */
    public function selectPrintOption(string $optionId, string $optionText)
    {
        $this->emit("selectDocumentPrintOption", $this->productId, $optionId);
        
        if ($this->optionId == $optionText) {
            $this->emit("selectText", $optionText);
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