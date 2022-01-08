<?php

namespace EXACTSports\FedEx\Base\Product;

class PrintsPerPage
{
    public function getPrintsPerPageOne(): \EXACTSports\FedEx\Base\Product\Choice
    {
        $choice = new Choice();
        $choice->id = '1448990257151';
        $choice->name = 'One';

        $property = new Property();
        $property->id = '1455387404922';
        $property->name = 'PRINTS_PER_PAGE';
        $property->value = 'ONE';

        $choice->properties[] = $property;

        return $choice;
    }
}
