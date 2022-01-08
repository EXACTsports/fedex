<?php

namespace EXACTSports\FedEx\Conversion;

class Options
{
    public Input $input;

    public function __construct()
    {
        $this->input = new Input();
    }
}
