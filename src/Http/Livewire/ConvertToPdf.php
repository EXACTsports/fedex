<?php 

namespace EXACTSports\FedEx\Http\Livewire;

use Livewire\Component; 
use EXACTSPorts\FedEx\Http\Services\FedexService;

class ConvertToPdf extends Component 
{
    public string $documentId; 
    public array $pdf = []; 
    
    protected $listeners = ['convertToPdf'];
    
    public function render()
    {
        return view("fedex::livewire.convert_to_pdf", ["pdf" => $this->pdf]);
    }

    /**
     * Converts to pdf
     */
    public function convertToPdf(string $documentId = "")
    {
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
    }
}
