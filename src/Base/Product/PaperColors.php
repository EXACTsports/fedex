<?php 

namespace EXACTSports\FedEx\Base\Product;

use EXACTSports\FedEx\Base\Product\Choice;
use EXACTSports\FedEx\Base\Product\Property;

class PaperColors
{    
    /**
     * Gets full color
     */
    public function getFullColor()
    {  
        $choice = new Choice();
        $choice->id = "1448988600611";
        $choice->name = "Full Color";

        $property = new Property();
        $property->id = "1453242778807";
        $property->name = "PRINT_COLOR";
        $property->value = "COLOR";

        $choice->properties[] = $property;

        return $choice;       
    }       

    /**
     * Gets black & white
     */
    public function getBlackWhite()
    {
        $choice = new Choice();
        $choice->id = "1448988600931";
        $choice->name = "Black & White";

        $property = new Property();
        $property->id = "1453242778807";
        $property->name = "PRINT_COLOR";
        $property->value = "B/W";

        $choice->properties[] = $property;

        return $choice;       
    }

    /**
     * Gets first page color, remaining pages black & white
     */
    public function getFirstPageColorRemainBlackWhite()
    {
        $choice = new Choice();
        $choice->id = "1448988601203";
        $choice->name = "First Page Color, remaining pages Black and White";

        $property = new Property();
        $property->id = "1453242778807";
        $property->name = "PRINT_COLOR";
        $property->value = "FIRST_COLOR_REMINAING_BLACK";

        $choice->properties[] = $property;

        return $choice;       
    }
}