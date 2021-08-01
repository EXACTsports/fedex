<?php

namespace EXACTSports\FedEx\Http\Services\UploadConversion;

use EXACTSports\FedEx\Http\Services\FedExService;
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
     * @param file $file
     */
    public function uploadDocument($file)
    {
        $this->documentFromLocalDrive->contents = file_get_contents($file->getRealPath());
        $this->documentFromLocalDrive->filename = $file->getClientOriginalName();
        $response = $this->fedExService->uploadDocumentFromLocalDrive((array) $this->documentFromLocalDrive);

        return $response;
    }
}