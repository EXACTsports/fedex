<?php

namespace EXACTSports\FedEx\Services\UploadConversion;

use EXACTSports\FedEx\Conversion\Options;
use EXACTSports\FedEx\FedExTrait;
use EXACTSports\FedEx\Services\FedExService;

class Conversion
{
    public FedExService $fedExService;

    use FedExTrait;

    public function __construct()
    {
        $this->fedExService = new FedExService();
    }

    /**
     * Converts uploaded document to pdf.
     * @param string $documentId
     * @param Options $options
     */
    public function convertToPdf(string $documentId, Options $options = null)
    {
        if ($options == null) {
            $options = new Options();
        }

        $options = $this->objectToArray($options);
        $options = $this->removeEmptyElements($options);
        $response = $this->fedExService->convertToPdf($documentId, $options);

        return $response->output->document;
    }
}
