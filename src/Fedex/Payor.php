<?php 

namespace EXACTSports\FedEx\Fedex;

class Payor
{
    public function __set($key, $value)
    {
        $this->$key = $value;
    }
}