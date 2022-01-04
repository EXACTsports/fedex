<?php

namespace EXACTSports\FedEx\Services\UploadConversion;

use EXACTSports\FedEx\Services\FedExService;

class PreviewConvertedDocument
{
    public FedExService $fedExService;

    public function __construct()
    {
        $this->fedExService = new FedExService();
    }

    /**
     * Gets preview document.
     */
    public function getPreview(string $documentId, int $pageNumber = 1) : string
    {
        $response = $this->fedExService->getDocumentPreview($documentId, $pageNumber);

        return $response->output->imageByteStream;
    }
}
