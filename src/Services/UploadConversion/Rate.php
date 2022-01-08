<?php

namespace EXACTSports\FedEx\Services\UploadConversion;

use EXACTSports\FedEx\Base\Product;
use EXACTSports\FedEx\FedExTrait;
use EXACTSports\FedEx\Rates\Request;
use JetBrains\PhpStorm\Pure;

class Rate
{
    use FedExTrait;

    public Request $request;

    #[Pure]
    public function __construct()
    {
        $this->request = new Request();
    }

    public function getRateRequest(Product $product) : array
    {
        $this->request->rateRequest->products[] = $product;

        return $this->removeEmptyElements($this->objectToArray($this->request));
    }
}
