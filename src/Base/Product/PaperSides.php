<?php

namespace EXACTSports\FedEx\Base\Product;

use JetBrains\PhpStorm\Pure;

class PaperSides
{
    #[Pure]
    public function getSingleSided(): Choice
    {
        $choice = new Choice();
        $choice->id = '1448988124560';
        $choice->name = 'Single-Sided';

        $property = new Property();
        $property->id = '1461774376168';
        $property->name = 'SIDE';
        $property->value = 'SINGLE';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1471294217799';
        $property->name = 'SIDE_VALUE';
        $property->value = '1';

        $choice->properties[] = $property;

        return $choice;
    }

    #[Pure]
    public function geDoubleSided(): Choice
    {
        $choice = new Choice();
        $choice->id = '1448988124807';
        $choice->name = 'Double-Sided';

        $property = new Property();
        $property->id = '1461774376168';
        $property->name = 'SIDE';
        $property->value = 'DOUBLE';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1471294217799';
        $property->name = 'SIDE_VALUE';
        $property->value = '2';

        $choice->properties[] = $property;

        return $choice;
    }
}
