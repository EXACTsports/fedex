<?php 

namespace EXACTSports\FedEx\Base\Product;

class Feature
{
    public string $id;          // N - Unique ID of the product feature
    public string $name;        // N - Name of the product feature (ex. Paper Size)
    public array $choice;       // N - Contains the user selection for a particular feature
}