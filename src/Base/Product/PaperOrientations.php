<?php

namespace EXACTSports\FedEx\Base\Product;

class PaperOrientations
{
    /**
     * Gets vertical.
     */
    public function getVertical()
    {
        $choice = new Choice();
        $choice->id = '1449000016192';
        $choice->name = 'Vertical';

        $property = new Property();
        $property->id = '1453260266287';
        $property->name = 'PAGE_ORIENTATION';
        $property->value = 'PORTRAIT';

        $choice->properties[] = $property;

        return $choice;
    }

    /**
     * Gets horizontal.
     */
    public function getHorizontal()
    {
        $choice = new Choice();
        $choice->id = '1449000016327';
        $choice->name = 'Horizontal';

        $property = new Property();
        $property->id = '1453260266287';
        $property->name = 'PAGE_ORIENTATION';
        $property->value = 'LANDSCAPE';

        $choice->properties[] = $property;

        return $choice;
    }
}
