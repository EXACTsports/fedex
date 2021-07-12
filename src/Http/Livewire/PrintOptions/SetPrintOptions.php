<?php 

namespace EXACTSports\FedEx\Http\Livewire\PrintOptions;

use Livewire\Component; 
use EXACTSports\FedEx\Http\Services\FedExService;
use EXACTSports\FedEx\Http\Services\ProductService;
use EXACTSports\FedEx\Rates\RateRequest;
use EXACTSports\FedEx\Base\Product\ContentAssociation;
use EXACTSports\FedEx\Base\Recipient;
use EXACTSports\FedEx\Base\ProductAssociation;

class SetPrintOptions extends Component 
{
    public array $document = []; 
    protected $listeners = ['updateDocument', 'selectDocumentPrintOption'];
    public array $printOptions = array(
        array(
            "id" => "1448981549109",
            "name" => "Size",
            "options" => array(
                "1448986650332" => '8.5" x 11"', 
                "1448986650652" => '8.5" x 14"', 
                "1448986651164" => '11" x 17"'
            )
        ),
        array(
            "id" => "1448981549741",
            "name" => "Paper",
            "options" => array(
                "withMenu" => array(
                    array(
                        "head" => "Standar White Papers",
                        "description" => "Everyday paper, 20-32 lb",
                        "options" => array(
                            "1448988661630" => "Laser (24 lb.)",
                            "1448988664295" => "Laser (32 lb.)"
                        ),
                        "default" => "Laser (32 lb.)"
                    ),
                    array(
                        "head" => "Professional White Papers",
                        "description" => "Thicker, higher-quality paper, 32lb+",
                        "options" => array(
                            "1448988661630" => "Laser (60 lb.)",
                            "1448988664295" => "Gloss Cover (100 lb.)"
                        )
                    ) 
                ),
            )
        ),
        array(
            "id" => "1448981549581",
            "name" => "Color/Black & White",
            "options" => array(
                "1448988600611" => "Full Color"
            )
        ),
        array(
            "id" => "1448981549269",
            "name" => "Sides",
            "options" => array(
                "1448988124560" => "Single-Sided"
            )
        ),
        array(
            "id" => "1448984679218",
            "name" => "Orientation",
            "options" => array(
                "1449000016192" => "Portrait", 
                "1449000016327" => "Landscape"
            )
        )
    );
    public string $selectedText = '';
    public array $sizes = array(
        "1448986650332" => array (
                "targetHeightInInches" => "11",
                "targetWidthInInches" => "8.5"
            )
    );

    public function mount()
    {
        // When loading page, build product with its corresponding print options
        $document = [];
        $document["fileName"] = "1-FedEx Office Print APIs Developer Guide_021921.pdf";
        $document["documentType"] = "PDF";
        $document["instanceId"] = time();
        $document["parentDocumentId"] = "12588214039128978257520357305540984964286";
        $document["documentId"] = "12588214041011852154202904765090670667322";
        $document["image"] = 'data:image/png;base64,';
        $document["totalAmount"] = 0;
        $document["metrics"] = array(
            "pageCount" => 12
        );

        $fedExService = new FedExService();
        $response = $fedExService->getDocumentPreview($document["documentId"]);
        $image = $response->output->imageByteStream;        
        $document["image"] = $document["image"] . $image;
        $this->document = $document;

        // Getting rate
        $product = new ProductService();
        $contentAssociation = new ContentAssociation();
        $contentAssociation->parentContentReference = $document["parentDocumentId"];
        $contentAssociation->contentReference = $document["documentId"];
        $contentAssociation->contentType = $document["documentType"];
        $contentAssociation->fileName = $document["fileName"];
        $product->contentAssociations[] = $contentAssociation;
        
        $productAssociation = new ProductAssociation();
        $productAssociation->id = $document["instanceId"];
        $productAssociation->quantity = 1;
        $recipient = new Recipient();
        $recipient->productAssociations[] = $productAssociation; 
        
        $rateRequest = new RateRequest();
        $rateRequest->products[] = $product;
        $rateRequest->recipients[] = $recipient;
    }

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
    public function updatePrintOptions(string $productId, string $optionId, string $documentId)
    {
        // If is being updated the paper size, we convert the pdf again
        if ($productId === "1448981549109") {
            $size = $this->sizes[$optionId];
            $options = new Options();

            $options->input->conversionOptions->targetHeightInInches = $size["targetHeightInInches"];
            $options->input->conversionOptions->targetWidthInInches = $size["targetWidthInInches"];
            $options = json_decode(json_encode($options), true);
            $options = $this->removeEmptyElements($options);
            $response = $fedExService->convertToPdf($documentId, $options);
        }
        // $this->emit("updatePrintOptions", $productId, $optionId);
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
