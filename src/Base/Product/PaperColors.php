<?php

namespace EXACTSports\FedEx\Base\Product;

use JetBrains\PhpStorm\Pure;

class PaperColors
{
    #[Pure]
    public function getFullColor(): Choice
    {
        $choice = new Choice();
        $choice->id = '1448988600611';
        $choice->name = 'Full Color';

        $property = new Property();
        $property->id = '1453242778807';
        $property->name = 'PRINT_COLOR';
        $property->value = 'COLOR';

        $choice->properties[] = $property;

        return $choice;
    }

    #[Pure]
    public function getBlackWhite(): Choice
    {
        $choice = new Choice();
        $choice->id = '1448988600931';
        $choice->name = 'Black & White';

        $property = new Property();
        $property->id = '1453242778807';
        $property->name = 'PRINT_COLOR';
        $property->value = 'B/W';

        $choice->properties[] = $property;

        return $choice;
    }

    #[Pure]
    public function getFirstPageColorRemainBlackWhite(): Choice
    {
        $choice = new Choice();
        $choice->id = '1448988601203';
        $choice->name = 'First Page Color, remaining pages Black and White';

        $property = new Property();
        $property->id = '1453242778807';
        $property->name = 'PRINT_COLOR';
        $property->value = 'FIRST_COLOR_REMINAING_BLACK';

        $choice->properties[] = $property;

        return $choice;
    }
}
