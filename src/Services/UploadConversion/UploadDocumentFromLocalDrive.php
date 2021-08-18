<?php

namespace EXACTSports\FedEx\Services\UploadConversion;

use EXACTSports\FedEx\Services\FedExService;
use EXACTSports\FedEx\DocumentUpload\DocumentFromLocalDrive;

class UploadDocumentFromLocalDrive
{
    private FedExService $fedExService;
    private DocumentFromLocalDrive $documentFromLocalDrive;

    public function __construct()
    {
        $this->fedExService = new FedExService();
        $this->documentFromLocalDrive = new DocumentFromLocalDrive;
    }

    /**
     * Uploads document
     * @param string $contents
     * @param string $fileName
     */
    public function uploadDocument(string $contents, string $fileName) : object
    {
        $this->documentFromLocalDrive->contents = $contents;
        $this->documentFromLocalDrive->filename = $fileName;
        $response = $this->fedExService->uploadDocumentFromLocalDrive((array) $this->documentFromLocalDrive);

        return $response->output->document;
    }
}