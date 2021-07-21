<?php

namespace EXACTSports\FedEx\Base\Product;

class Property
{
    public string $id;      // N - Unique ID of the selected property
    public string $name;    // N - Name of the selected property
    public bool | string | null $value;   // N - Value of the selected property

    public function __construct(string $id = '', string $name = '', $value = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
    }
}
