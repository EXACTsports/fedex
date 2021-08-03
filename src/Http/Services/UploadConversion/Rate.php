<?php

namespace EXACTSports\FedEx\Http\Services\UploadConversion;

use EXACTSports\FedEx\FedExTrait;
use EXACTSports\FedEx\Rates\Request;
use EXACTSports\FedEx\Base\Product;

class Rate
{
    use FedExTrait;
    public Request $request; 

    public function __construct()
    {
        $this->request = new Request();
    }

    /**
     * Gets rate request
     */
    public function getRateRequest(Product $product) : array
    {
        $this->request->rateRequest->products[] = $product;
        
        return $this->removeEmptyElements($this->objectToArray($this->request));
    }
}