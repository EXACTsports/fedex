<?php

namespace EXACTSports\FedEx\Conversion;

use JetBrains\PhpStorm\Pure;

class Input
{
    public ConversionOptions $conversionOptions;

    #[Pure]
    public function __construct()
    {
        $this->conversionOptions = new ConversionOptions();
    }
}
