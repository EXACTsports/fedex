<?php

namespace EXACTSports\FedEx\Conversion;

use EXACTSports\FedEx\Conversion\ConversionOptions;

class Input
{
    public ConversionOptions $conversionOptions;

    public function __construct()
    {
        $this->conversionOptions = new ConversionOptions();
    }
}
