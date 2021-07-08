<?php 

namespace EXACTSports\FedEx\Http\Livewire\PrintOptions;

use Livewire\Component; 
use EXACTSports\FedEx\Http\Services\FedexService;

class SetPrintOptions extends Component 
{
    public array $document = []; 
    protected $listeners = ['updateDocument', 'selectDocumentPrintOption'];
    public array $printOptions = array(
        "1448981549109" => array(
                            "name" => "Size",
                            "options" => array(
                                "1448986650332" => '8.5" x 11"', 
                                "1448986650652" => '8.5" x 14"', 
                                "1448986651164" => '11" x 17"'
                            )
                        ),
        "1448984679218" => array(
                            "name" => "Orientation",
                            "options" => array(
                                "1449000016192" => "Portrait", 
                                "1449000016327" => "Landscape")
                        )
    );
    public string $selectedText = '';

    /**
     * Updates document
     */
    public function updateDocument(array $document)
    {
        $this->document = $document;
        $this->emit("showLoader", false);
    }

    /**
     * Selects document print option
     */
    public function selectDocumentPrintOption(string $productId, string $optionId)
    {
        $printOption = $this->printOptions[$productId];
    }
    
    public function render()
    {
        return view("fedex::livewire.print_options.set_print_options", 
            [
                "document" => $this->document, 
                "printOptions" => $this->printOptions
            ]
        );
    }
}
