<?php

namespace EXACTSports\FedEx\Conversion;

use JetBrains\PhpStorm\Pure;

class Options
{
    public Input $input;

    #[Pure]
    public function __construct()
    {
        $this->input = new Input();
    }
}
