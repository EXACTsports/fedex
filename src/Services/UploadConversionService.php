<?php

namespace EXACTSports\FedEx\Services;

use EXACTSports\FedEx\Base\Product;
use EXACTSports\FedEx\Base\Product\ContentAssociation;
use EXACTSports\FedEx\Base\Product\ProductFeatures;
use EXACTSports\FedEx\Conversion\Options;
use EXACTSports\FedEx\Services\UploadConversion\Conversion;
use EXACTSports\FedEx\Services\UploadConversion\PreviewConvertedDocument;
use EXACTSports\FedEx\Services\UploadConversion\Rate;
use EXACTSports\FedEx\Services\UploadConversion\UploadDocumentFromLocalDrive;

class UploadConversionService
{
    // TODO: Is this class used? It does not appear to be. Delete if not.

    private UploadDocumentFromLocalDrive $uploadDocumentFromLocalDrive;

    private Conversion $conversion;

    private PreviewConvertedDocument $previewConvertedDocument;

    private ProductService $productService;

    private ProductFeatures $productFeatures;

    private FedExService $fedExService;

    private array $features = [];

    public array $selectedPrintOptions = [
        '1448981549109' => [
            'Size' => '8.5x11',
        ],
        '1448981549741' => [
            'Paper Type' => 'Laser (32 lb.)',
        ],
        '1448981549581' => [
            'Print Color' => 'Full Color',
        ],
        '1448981549269' => [
            'Sides' => 'Single-Sided',
        ],
        '1448984679218' => [
            'Orientation' => 'Vertical',
        ],
        '1448981554101' => [
            'Prints Per Page' => 'One',
        ],
        '1448984877869' => [
            'Cutting' => 'None',
        ],
        '1448981555573' => [
            'Hole Punching' => 'None',
        ],
        '1448981532145' => [
            'Collation' => 'Collated',
        ],
        '1448981554597' => [
            'Binding' => 'None',
        ],
        '1448984679442' => [
            'Lamination' => 'None',
        ],
    ];

    public array $convertToPdfIds = ['1448981549109', '1448984679218'];

    public Product $baseProduct;

    public function __construct()
    {
        $this->fedExService = new FedExService();
        $this->uploadDocumentFromLocalDrive = new UploadDocumentFromLocalDrive();
        $this->conversion = new Conversion();
        $this->previewConvertedDocument = new PreviewConvertedDocument();
        $this->productFeatures = new ProductFeatures();
        $this->features = $this->productFeatures->get();
        $this->productService = new ProductService();
    }

    /**
     * Uploads file to FedEx.
     * @param string $contents
     * @param string $fileName
     * @param int $quantity
     * @param array $options
     * @return array
     */
    public function uploadFile(string $contents, string $fileName, int $quantity = 1, $options = []): array
    {
        // Upload document
        $document = $this->uploadDocumentFromLocalDrive->uploadDocument($contents, $fileName);
        $documentId = $document->documentId;
        $this->baseProduct = (new ProductService())->getBaseProduct();

        if (count($options) > 0) {
            $this->baseProduct->features = $this->productFeatures->getBaseFeatures($options);
        }

        return $this->processDocument($documentId, $quantity);

    }


    public function processDocument(string $documentId, int $quantity = 1, ?Options $options = null): array
    {
        // Convert to pdf
        $document = $this->convertToPdf($documentId, $options);

        // Document preview
        $image = $this->getDocumentPreview($document->documentId);
        $document->image = $image;
        $document->quantity = $quantity;

        if ($quantity > 1) {
            $this->baseProduct->qty = $quantity;
        }

        $this->baseProduct->userProductName = $document->originalDocumentName;
        $this->baseProduct->contentAssociations[] = $this->getContentAssociation($document);
        $document->product = $this->baseProduct;

        // Get rate
        $rate = $this->getRate($document);
        $document->rate = $rate;

        $documentArray = [];
        $documentArray = $this->setDocumentArray($document);

        return $documentArray;
    }

    /**
     * Gets content association.
     * @param object $document
     * @return ContentAssociation
     */
    public function getContentAssociation($document) : ContentAssociation
    {
        return $this->productService->getContentAssociation($document);
    }

    /**
     * Gets document rate.
     */
    public function getRate(object $document) : object
    {
        $rate = new Rate();
        $rateRequest = $rate->getRateRequest($this->baseProduct);
        $response = $this->fedExService->getRate($rateRequest);
        $rateDetail = $response->output->rate->rateDetails[0];

        if (isset($response->output->alerts)) {
            $rateDetail->hasAlerts = 1;
            $rateDetail->alerts = $response->output->alerts;
        }

        return $rateDetail;
    }

    /**
     * Sets document array.
     */
    public function setDocumentArray(object $document) : array
    {
        $documentArray = [];
        $documentArray['name'] = 'Multi Sheet';
        $documentArray['quantity'] = $document->quantity;
        $documentArray['documentName'] = $document->originalDocumentName;
        $documentArray['parentDocumentId'] = $document->parentDocumentId;
        $documentArray['documentId'] = $document->documentId;
        $documentArray['image'] = 'data:image/png;base64,' . $document->image;
        $documentArray['totalAmount'] = 0;
        $documentArray['metrics'] = $document->metrics;
        $documentArray['selectedPrintOptions'] = $this->selectedPrintOptions;
        $documentArray['product'] = $document->product;
        $documentArray['rate'] = $document->rate;

        return $documentArray;
    }

    /**
     * Converts uploaded document to pdf.
     */
    public function convertToPdf(string $documentId, $options = null)
    {
        return $this->conversion->convertToPdf($documentId, $options);
    }

    /**
     * Reconverts to pdf.
     * @param string $documentId
     */
    public function reconvertToPdf(string $documentId, string $printOptionId, string $optionId): array
    {
        $options = new Options();

        // Size
        if ($printOptionId === '1448981549109') {
            $choice = $this->getChoice($printOptionId, $optionId);
            $options->input->conversionOptions->targetWidthInInches = $choice->properties[1]->value;
            $options->input->conversionOptions->targetHeightInInches = $choice->properties[0]->value;
        }

        // Orientation
        if ($printOptionId === '1448984679218') {
            $choice = $this->getChoice($printOptionId, $optionId);
            $options->input->conversionOptions->orientation = $choice->properties[0]->value;
        }

        return $this->processDocument($documentId, 1, $options);
    }

    /**
     * Gets document preview.
     * @param string $documentId
     * @param int $pageNumber
     */
    public function getDocumentPreview(string $documentId, int $pageNumber = 1) : string
    {
        return $this->previewConvertedDocument->getPreview($documentId, $pageNumber);
    }

    /**
     * Gets print option index.
     * @param string $printOptionId
     */
    public function getPrintOptionIndex(string $printOptionId)
    {
        $printOptionIds = collect($this->productService->printOptionIds);

        return $printOptionIds->search($printOptionId);
    }

    /**
     * Gets choice.
     * @param string $printOptionId
     * @param string $optionId
     */
    public function getChoice(string $printOptionId, string $optionId)
    {
        $selectedChoice = $this->features[$printOptionId]['choices'][$optionId];

        return $selectedChoice;
    }

    /**
     * Updates current document.
     * @param array $document
     * @param string $printOptionId - Paper Size, Paper Color, etc
     * @param string $optionId - Paper Size -> 8.5x11, etc
     */
    public function updatePrintOption(array $currentDocument, string $printOptionId, string $optionId)
    {
        $selectedChoice = $this->getChoice($printOptionId, $optionId);
        $currentDocumentProduct = $currentDocument['product'];
        $currentDocumentProduct['features'][$this->getPrintOptionIndex($printOptionId)]['choice'] = $selectedChoice;
        $currentDocument['product'] = $currentDocumentProduct;

        return $currentDocument;
    }
}
