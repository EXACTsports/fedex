<?php

namespace EXACTSports\FedEx\Http\Services\UploadConversion;

use EXACTSports\FedEx\Http\Services\FedExService;

class PreviewConvertedDocument
{
    public FedExService $fedExService;
    
    public function __construct()
    {
        $this->fedExService = new FedExService();
    }

    /**
     * Gets preview document
     */
    public function getPreview(string $documentId, int $pageNumber = 1)
    {
        $response = $this->fedExService->getDocumentPreview($documentId, $pageNumber);
        
        return $response;
    }
}