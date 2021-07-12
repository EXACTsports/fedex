<?php 

namespace EXACTSports\FedEx\Http\Livewire\PrintOptions;

use Livewire\Component; 

class PrintOptionPanel extends Component 
{  
    protected $listeners = ["openPrintOptionPanel", "closeOpenedPanel"];
    public string $openPrintOptionPanelStyle = "opacity: 0;"; 
    public array $printOptions = [];
    public string $selectedProductId = "";
    public string $productId = "";
    public bool $openedPanel = false;
    public string $optionId = "";
    public string $optionMenuClass= "p-7";

    public function mount(array $printOptions = [], string $selectedProductId = "", string $optionId = "")
    {
        $this->printOptions = $printOptions; 
        $this->selectedProductId = $selectedProductId; 
        $this->optionId = $optionId;

        if (isset($this->printOptions["withMenu"])) {
            $this->optionMenuClass = "p-5";
        }
    }

    /**
     * Closes opened panel
     */
    public function closeOpenedPanel()
    {
        if ($this->openedPanel) {
            $this->openPrintOptionPanel(false);
        }
    }

    /**
     * Opens print option panel
     * @param bool $value
     */
    public function openPrintOptionPanel(bool $value, int $leftPx = 0, string $productId = "")
    {
        $this->openPrintOptionPanelStyle = $this->selectedProductId === $productId && 
            $value ? "left: ". $leftPx . "px; z-index: 10; opacity: 1;" : "opacity: 0";
        $this->productId = $productId;

        if ($value) {
            $this->openedPanel = true;
        } else {
            $this->openedPanel = false;
        }
    }

    /**
     * Selects print option
     */
    public function selectPrintOption(string $optionId, string $optionText)
    {
        $this->emit("selectDocumentPrintOption", $this->productId, $optionId);
        $this->emit("selectText", $optionText, $this->selectedProductId);
    }

    public function render()
    {
        return view("fedex::livewire.print_options.print_option_panel", 
            [
                "openPrintOptionPanelStyle" => $this->openPrintOptionPanelStyle,
                "printOptions" => $this->printOptions,
                "selectedProductId" => $this->selectedProductId, 
                "productId" => $this->productId,
                "optionId" => $this->optionId,
                "optionMenuClass" => $this->optionMenuClass
            ]
        );
    }
}