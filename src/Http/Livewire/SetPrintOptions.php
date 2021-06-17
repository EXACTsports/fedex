<?php 

namespace EXACTSports\FedEx\Http\Livewire;

use Livewire\Component; 
use EXACTSPorts\FedEx\Http\Services\FedexService;

class SetPrintOptions extends Component 
{
    protected $listeners = ['setPrintOptions'];
    
    public function render()
    {
        return view("fedex::livewire.set_print_options");
    }

    /**
     * Converts to pdf
     */
    public function setPrintOptions($test)
    {
        print_r($test);
        die;
        /*
        $options = array(
                "input" =>  array(
                    "conversionOptions" => array(
                        "lockContentOrientation" => false,
                        "minDPI" => "150.0",
                        "defaultImageWidthInInches" => "8.5",
                        "defaultImageHeightInInches" => "11"
                    )
                )
            );

            $fedexService = new FedexService();
            $response = $fedexService->convertToPdf($documentId, $options);

            $this->pdf = $response["output"]["document"]; 
        */
    }
}
