<?php

namespace EXACTSports\FedEx\Base\Product;

use EXACTSports\FedEx\Base\Product\Choice;

class Feature
{
    public string $id;          // N - Unique ID of the product feature
    public string $name;        // N - Name of the product feature (ex. Paper Size)
    public Choice $choice;       // N - Contains the user selection for a particular feature

    public function __construct(string $id = '', string $name = '', Choice $choice = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->choice = $choice;
    }
}
