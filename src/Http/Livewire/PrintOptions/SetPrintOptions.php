<?php 

namespace EXACTSports\FedEx\Http\Livewire\PrintOptions;

use Livewire\Component; 
use EXACTSports\FedEx\Http\Services\FedexService;

class SetPrintOptions extends Component 
{
    public array $document = []; 
    protected $listeners = ['updateDocument'];
    public array $printOptions = array(
        "1448981549109" => array(
                            "name" => "Size",
                            "options" => array(
                                "" => '8.5" x 11"', 
                                "" => '8.5" x 14"', 
                                "" => '11" x 17"'
                            )
                        ),
        "1448981549109" => array(
                            "name" => "Orientation",
                            "options" => array("Portrait", "Landscape")
                        )
    );

    public function updateDocument(array $document)
    {
        $this->document = $document;
        $this->emit("showLoader", false);
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
