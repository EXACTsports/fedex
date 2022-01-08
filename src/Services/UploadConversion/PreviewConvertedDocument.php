<?php

namespace EXACTSports\FedEx\Services\UploadConversion;

use EXACTSports\FedEx\Services\FedExService;
use GuzzleHttp\Exception\GuzzleException;

class PreviewConvertedDocument
{
    public FedExService $fedExService;

    public function __construct()
    {
        $this->fedExService = new FedExService();
    }

    /**
     * @throws GuzzleException
     */
    public function getPreview(string $documentId, int $pageNumber = 1) : string
    {
        $response = $this->fedExService->getDocumentPreview($documentId, $pageNumber);

        return $response->output->imageByteStream;
    }
}
