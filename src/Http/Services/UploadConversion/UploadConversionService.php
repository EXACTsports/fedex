<?php

namespace EXACTSports\FedEx\Http\Services\UploadConversion;

use EXACTSports\FedEx\Base\PageGroup;
use EXACTSports\FedEx\Base\Product;
use EXACTSports\FedEx\Base\Product\ContentAssociation;
use EXACTSports\FedEx\Http\Services\ProductService;
use EXACTSports\FedEx\Base\Product\ProductFeatures;
use EXACTSports\FedEx\Conversion\Options;
use EXACTSports\FedEx\Http\Services\UploadConversion\UploadDocumentFromLocalDrive;
use EXACTSports\FedEx\Http\Services\UploadConversion\Conversion;
use EXACTSports\FedEx\Http\Services\UploadConversion\PreviewConvertedDocument;

use Illuminate\Support\Collection;

class UploadConversionService
{
    private UploadDocumentFromLocalDrive $uploadDocumentFromLocalDrive;
    private Conversion $conversion;
    private PreviewConvertedDocument $previewConvertedDocument;
    private ProductService $productService;
    private ProductFeatures $productFeatures;
    private array $features = [];
    public array $selectedPrintOptions = [
        "1448981549109" => array(
            "Size" => "8.5x11"
        ),
        "1448981549741" => array(
            "Paper Type" => "Laser (32 lb.)"
        ),
        "1448981549581" => array(
            "Print Color" => "Full Color"
        ),
        "1448981549269" => array(
            "Sides" => "Single-Sided"
        ),
        "1448984679218" => array(
            "Orientation" => "Vertical"
        ),
        "1448981554101" => array(
            "Prints Per Page" => "One"
        ),
        "1448984877869" => array(
            "Cutting" => "None"
        ),
        "1448981555573" => array(
            "Hole Punching" => "None"
        ),
        "1448981532145" => array(
            "Collation" => "Collated"
        ),
        "1448981554597" => array(
            "Binding" => "None"
        ),
        "1448984679442" => array(
            "Lamination" => "None"
        )
    ];
    public array $convertToPdfIds = ["1448981549109", "1448984679218"];

    public function __construct()
    {
        $this->uploadDocumentFromLocalDrive = new UploadDocumentFromLocalDrive();
        $this->conversion = new Conversion();
        $this->previewConvertedDocument = new PreviewConvertedDocument();
        $this->productFeatures = new ProductFeatures();
        $this->features = $this->productFeatures->get();
        $this->productService = new ProductService();
    }

    /**
     * Uploads file to FedEx
     * @param $file File
     */
    public function uploadFile($file)
    {
        // Upload document
        $response = $this->uploadDocumentFromLocalDrive->uploadDocument($file);
        $documentId = $response->output->document->documentId;
        $document = $this->processDocument($documentId);
       
        return $document;
    }

    /**
     * Processes document
     * @param string $documentId
     */
    public function processDocument(string $documentId, $options = null)
    {
        // Convert to pdf
        $document = $this->convertToPdf($documentId, $options);
        
        // Document preview
        $image = $this->getDocumentPreview($document->documentId);
        $document->image = $image;
        
        $documentArray = [];
        $documentArray = $this->setDocumentArray($document);

        return $documentArray;
    }

    /**
     * Sets document array
     */
    public function setDocumentArray(object $document) : array
    {
        $product = $this->productService->getBaseProduct();
        $documentArray = [];
        
        $documentArray['name'] = "Multi Sheet";
        $documentArray['documentName'] = $document->originalDocumentName;
        $documentArray['parentDocumentId'] = $document->parentDocumentId;
        $documentArray['documentId'] = $document->documentId;
        $documentArray['image'] = 'data:image/png;base64,' . $document->image;
        $documentArray['totalAmount'] = 0;
        $documentArray['metrics'] = $document->metrics;
        $documentArray['selectedPrintOptions'] = $this->selectedPrintOptions;

        $pageGroup = new PageGroup();
        $pageGroup->start = $document->metrics->pageGroups[0]->startPageNum;
        $pageGroup->end = $document->metrics->pageGroups[0]->endPageNum;
        $pageGroup->width = $document->metrics->pageGroups[0]->pageWidthInches;
        $pageGroup->height = $document->metrics->pageGroups[0]->pageHeightInches;

        $product->userProductName = $document->originalDocumentName;
        $contentAssociation = new ContentAssociation();
        $contentAssociation->parentContentReference = $document->parentDocumentId;
        $contentAssociation->contentReference = $document->documentId;
        $contentAssociation->contentType = $document->documentType;
        $contentAssociation->fileName = $document->originalDocumentName;
        $contentAssociation->pageGroups[] = $pageGroup;

        $product->contentAssociations[] = $contentAssociation;

        $documentArray['product'] = $product;

        return $documentArray;
    }

    /**
     * Converts uploaded document to pdf
     */
    public function convertToPdf(string $documentId, $options = null)
    {
        $response = $this->conversion->convertToPdf($documentId, $options);

        return $response->output->document;
    }

    /**
     * Reconverts to pdf
     * @param string $documentId
     */
    public function reconvertToPdf(string $documentId, string $printOptionId, string $optionId)
    {
        $options = new Options();

        // Size
        if ($printOptionId === "1448981549109") {
            $choice = $this->getChoice($printOptionId, $optionId);
            $options->input->conversionOptions->targetWidthInInches = $choice->properties[1]->value;
            $options->input->conversionOptions->targetHeightInInches = $choice->properties[0]->value;
        }

        // Orientation 
        if ($printOptionId === "1448984679218") {
            $choice = $this->getChoice($printOptionId, $optionId);
            $options->input->conversionOptions->orientation = $choice->properties[0]->value;
        }
        
        $document = $this->processDocument($documentId, $options);
 
        return $document;
    }

    /**
     * Gets document preview 
     * @param string $documentId
     * @param int $pageNumber
     */
    public function getDocumentPreview(string $documentId, int $pageNumber = 1)
    {
        $response = $this->previewConvertedDocument->getPreview($documentId, $pageNumber);

        return $response->output->imageByteStream;
    }

    /**
     * Gets print option index
     * @param string $printOptionId
     */
    public function getPrintOptionIndex(string $printOptionId)
    {
        $printOptionIds = collect($this->productService->printOptionIds);
        
        return $printOptionIds->search($printOptionId);
    }

    /**
     * Gets choice
     * @param string $printOptionId
     * @param string $optionId
     */
    public function getChoice(string $printOptionId, string $optionId)
    {
        $selectedChoice = $this->features[$printOptionId]["choices"][$optionId];

        return $selectedChoice;
    }

    /**
     * Updates current document
     * @param array $document
     * @param string $printOptionId - Paper Size, Paper Color, etc 
     * @param string $optionId - Paper Size -> 8.5x11, etc
     */
    public function updatePrintOption(array $currentDocument, string $printOptionId, string $optionId)
    {
        $selectedChoice = $this->getChoice($printOptionId, $optionId);
        $currentDocumentProduct = $currentDocument["product"];
        $currentDocumentProduct["features"][$this->getPrintOptionIndex($printOptionId)]["choice"] = $selectedChoice;
        $currentDocument["product"] = $currentDocumentProduct;

        return $currentDocument;
    }
}