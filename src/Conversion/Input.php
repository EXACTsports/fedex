<?php

namespace EXACTSports\FedEx\Conversion;

class Input
{
    public ConversionOptions $conversionOptions;

    public function __construct()
    {
        $this->conversionOptions = new ConversionOptions();
    }
}
