<?php

namespace EXACTSports\FedEx\Services\UploadConversion;

use EXACTSports\FedEx\Conversion\Options;
use EXACTSports\FedEx\FedExTrait;
use EXACTSports\FedEx\Services\FedExService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class Conversion
{
    public FedExService $fedExService;

    use FedExTrait;

    public function __construct()
    {
        $this->fedExService = new FedExService();
    }

    /**
     * @throws GuzzleException
     */
    public function convertToPdf(string $documentId, Options $options = null)
    {

        if ($options == null) {
            $options = new Options();
        }

        $options = $this->objectToArray($options);
        $options = $this->removeEmptyElements($options);

        $response = $this->fedExService->convertToPdf($documentId, $options);

       return property_exists($response->output, 'document') ? $response->output?->document : $fake;
    }
}
