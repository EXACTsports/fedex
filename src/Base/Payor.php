<?php 

namespace EXACTSports\FedEx\Base;

class Payor
{
    public function __set($key, $value)
    {
        $this->$key = $value;
    }
}