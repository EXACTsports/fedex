<?php

namespace EXACTSports\FedEx\Base\Product;

class Choice
{
    public string $id;          // N - Unique ID for the selected choice
    public string $name;        // N - Name of the selected choice
    public array $properties;   // N - Contains the properties specific to the choice that was selected

    public function __construct(string $id = '', string $name = '', array $properties = [])
    {
        $this->id = $id;
        $this->name = $name;
        $this->properties = $properties;
    }
}
