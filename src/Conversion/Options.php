<?php

namespace EXACTSports\FedEx\Conversion;

use EXACTSports\FedEx\Conversion\Input;

class Options
{
    public Input $input; 

    public function __construct()
    {
        $this->input = new Input();
    }
}
