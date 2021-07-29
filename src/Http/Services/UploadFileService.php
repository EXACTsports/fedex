<?php

namespace EXACTSports\FedEx\Http\Services;

use EXACTSports\FedEx\Http\Services\FedExService;
use EXACTSports\FedEx\Http\Services\ProductService;
use EXACTSports\FedEx\Base\Product\ProductFeatures;
use Illuminate\Support\Collection;

class UploadFileService
{
    private ProductService $productService;
    private ProductFeatures $productFeatures;
    private array $features = [];

    public function __construct()
    {
        $this->productService = new ProductService();
        $this->productFeatures = new ProductFeatures();
        $this->features = $this->productFeatures->get();
    }

    /**
     * Updates current document
     * @param array $document
     * @param string $printOptionId - Paper Size, Paper Color, etc 
     * @param string $optionId - Paper Size -> 8.5x11, etc
     */
    public function updatePrintOption(array $currentDocument, string $printOptionId, string $optionId)
    {
        $printOptionIds = collect($this->productService->printOptionIds);
        $printOptionIndex = $printOptionIds->search($printOptionId);
        $selectedChoice = $this->features[$printOptionId]["choices"][$optionId];
        $currentDocumentProduct = $currentDocument["product"];
        $currentDocumentProduct["features"][$printOptionIndex]["choice"] = $selectedChoice;
        $currentDocument["product"] = $currentDocumentProduct;

        return $currentDocument;
    }
}