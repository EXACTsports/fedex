<?php 

namespace EXACTSports\FedEx\Http\Livewire;

use Livewire\Component; 
use Livewire\WithFileUploads;
use EXACTSports\FedEx\DocumentUpload\DocumentFromLocalDrive;
use EXACTSports\FedEx\Conversion\Options;
use EXACTSports\FedEx\Http\Services\FedExService;
use EXACTSports\FedEx\Http\Services\ProductService;
use EXACTSports\FedEx\Rates\RateRequest;
use EXACTSports\FedEx\Base\Product;
use EXACTSports\FedEx\Base\Product\ContentAssociation;
use EXACTSports\FedEx\FedExTrait;

class UploadFile extends Component
{
    use WithFileUploads;
    use FedExTrait;

    public $file = null;
    public array $documents = [];
    public array $selectedPrintOptions = array(
        "Size" => "8.5x11",
        "Paper Type" => " Laser (32 lb.)",
        "Print Color" => "Full Color",
        "Sides" => "Single-Sided",
        "Orientation" => "Vertical",
        "Prints Per Page" => "One",
        "Collation" => "Collated"
    );

    /**
     * Sets documents
     */
    public function setDocuments(array $document)
    {
        $this->documents[] = $document;
        $this->emit("showLoader", false);
    }

    public function goToCheckout()
    {
        $this->emit("showCheckout");
        $this->emit("setDocumentsToCheckout", $this->documents);
    }

    public function render()
    {
        if ($this->file !== null) {
            $fedExService = new FedExService(); 
            $product = (new ProductService())->getBaseProduct();
            $documentFromLocalDrive = new DocumentFromLocalDrive();
            // Upload document
            $documentFromLocalDrive->contents = file_get_contents($this->file->getRealPath());
            $documentFromLocalDrive->filename = $this->file->getClientOriginalName();
            $response = $fedExService->uploadDocumentFromLocalDrive((array) $documentFromLocalDrive);
            $documentName = $response->output->document->documentName;
            $documentId = $response->output->document->documentId;
            
            // Convert to pdf 
            $options = new Options();
            $options = $this->objectToArray($options);
            $options = $this->removeEmptyElements($options);
            $response = $fedExService->convertToPdf($documentId, $options);

            $document = $response->output->document;
            $parentDocumentId = $document->parentDocumentId;
            $documentId = $document->documentId;
            $metrics = $document->metrics;
            $documentType = $document->documentType;
            
            // Document preview
            $response = $fedExService->getDocumentPreview($documentId);
            $image = $response->output->imageByteStream;
            
            $document = [];
            $document["documentName"] = $documentName;
            $document["parentDocumentId"] = $parentDocumentId;
            $document["documentId"] = $documentId;
            $document["image"] = 'data:image/png;base64,' . $image;
            $document["totalAmount"] = 0;
            $document["metrics"] = $metrics;
            $document["selectedPrintOptions"] = $this->selectedPrintOptions;
            
            $product->userProductName = $documentName;
            $contentAssociation = new ContentAssociation();
            $contentAssociation->parentContentReference = $parentDocumentId; 
            $contentAssociation->contentReference = $documentId;
            $contentAssociation->contentType = $documentType;
            $contentAssociation->fileName = $documentName;

            $product->contentAssociations[] = $contentAssociation; 

            $document["product"] = $product;

            $this->file = null;

            $this->setDocuments($document);
        }
        
        return view("fedex::livewire.upload_file", 
            array("documents" => $this->documents)
        );
    }
}
