<?php

namespace EXACTSports\FedEx\Http\Livewire;

use EXACTSports\FedEx\Base\PageGroup;
use EXACTSports\FedEx\Base\Product;
use EXACTSports\FedEx\Base\Product\ContentAssociation;
use EXACTSports\FedEx\Conversion\Options;
use EXACTSports\FedEx\DocumentUpload\DocumentFromLocalDrive;
use EXACTSports\FedEx\FedExTrait;
use EXACTSports\FedEx\Http\Services\FedExService;
use EXACTSports\FedEx\Http\Services\ProductService;
use EXACTSports\FedEx\Rates\RateRequest;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadFile extends Component
{
    use WithFileUploads;
    use FedExTrait;

    public $file = null;
    public array $selectedPrintOptions = [
        'Size' => '8.5x11',
        'Paper Type' => ' Laser (32 lb.)',
        'Print Color' => 'Full Color',
        'Sides' => 'Single-Sided',
        'Orientation' => 'Vertical',
        'Prints Per Page' => 'One',
        'Collation' => 'Collated',
    ];

    /**
     * Sets documents.
     */
    public function setDocument(array $document)
    {
        $this->emit('showLoader', false);
        $this->emit("addDocument", $document);
    }

    /**
     * Adds document
     */
    public function addDocument(array $document)
    {
        $this->emit("addDocument", $document);
    }

    public function goToCheckout()
    {
        print_r("testing...");
        die;
        $this->emit('showCheckout');
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
            $document['name'] = "Multi Sheet";
            $document['documentName'] = $documentName;
            $document['parentDocumentId'] = $parentDocumentId;
            $document['documentId'] = $documentId;
            $document['image'] = 'data:image/png;base64,' . $image;
            $document['totalAmount'] = 0;
            $document['metrics'] = $metrics;
            $document['selectedPrintOptions'] = $this->selectedPrintOptions;

            $pageGroup = new PageGroup();
            $pageGroup->start = $metrics->pageGroups[0]->startPageNum;
            $pageGroup->end = $metrics->pageGroups[0]->endPageNum;
            $pageGroup->width = $metrics->pageGroups[0]->pageWidthInches;
            $pageGroup->height = $metrics->pageGroups[0]->pageHeightInches;

            $product->userProductName = $documentName;
            $contentAssociation = new ContentAssociation();
            $contentAssociation->parentContentReference = $parentDocumentId;
            $contentAssociation->contentReference = $documentId;
            $contentAssociation->contentType = $documentType;
            $contentAssociation->fileName = $documentName;
            $contentAssociation->pageGroups[] = $pageGroup;

            $product->contentAssociations[] = $contentAssociation;

            $document['product'] = $product;

            $this->file = null;

            $this->setDocument($document);
        }

        return view('fedex::livewire.upload_file');
    }
}
