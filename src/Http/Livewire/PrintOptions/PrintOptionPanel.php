<?php 

namespace EXACTSports\FedEx\Http\Livewire\PrintOptions;

use Livewire\Component; 

class PrintOptionPanel extends Component 
{  
    protected $listeners = ["openPrintOptionPanel", "closeOpenedPanel"];
    public string $openPrintOptionPanelStyle = "opacity: 0;"; 
    public array $printOptions = [];
    public int $componentIndex = 0;
    public int $index = 0;
    public bool $openedPanel = false;

    public function mount(array $printOptions = [], int $componentIndex = 0)
    {
        $this->printOptions = $printOptions;
        $this->componentIndex = $componentIndex; 
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
    public function openPrintOptionPanel(bool $value, int $leftPx = 0, int $index = -1)
    {
        $this->openPrintOptionPanelStyle = $this->componentIndex === $index && $value ? "left: ". $leftPx . "px; z-index: 10; opacity: 1;" : "opacity: 0";
        $this->index = $index;

        if ($value) {
            $this->openedPanel = true;
        } else {
            $this->openedPanel = false;
        }
    }

    /**
     * Selects print option
     */
    public function selectPrintOption(string $param)
    {
        $test = $param;
    }

    public function render()
    {
        return view("fedex::livewire.print_options.print_option_panel", 
            [
                "openPrintOptionPanelStyle" => $this->openPrintOptionPanelStyle,
                "printOptions" => $this->printOptions,
                "componentIndex" => $this->componentIndex, 
                "index" => $this->index
            ]
        );
    }
}