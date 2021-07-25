<?php 

namespace EXACTSports\FedEx\Base\Product;

use EXACTSports\FedEx\Base\Product\Choice;
use EXACTSports\FedEx\Base\Product\Property;

class PaperColors
{
    public Choice $choice;
    public Property $property; 

    public function __construct(Choice $choice, Property $property)
    {
        $this->choice = $choice;
        $this->property = $property;
    }
    
    /**
     * Gets full color
     */
    public function getFullColor()
    {  
        $this->choice->id = "1448988600611";
        $this->choice->name = "Full Color";

        $this->property->id = "1453242778807";
        $this->property->name = "PRINT_COLOR";
        $this->property->value = "COLOR";

        $this->choice->properties[] = $this->property;

        return $this->choice;       
    }       

    /**
     * Gets black & white
     */
    public function getBlackWhite()
    {
        $this->choice->id = "1448988600931";
        $this->choice->name = "Black & White";

        $this->property->id = "1453242778807";
        $this->property->name = "PRINT_COLOR";
        $this->property->value = "B/W";

        $this->choice->properties[] = $this->property;

        return $this->choice;       
    }

    /**
     * Gets first page color, remaining pages black & white
     */
    public function getFirstPageColorRemainBlackWhite()
    {
        $this->choice->id = "1448988601203";
        $this->choice->name = "First Page Color, remaining pages Black and White";

        $this->property->id = "1453242778807";
        $this->property->name = "PRINT_COLOR";
        $this->property->value = "FIRST_COLOR_REMINAING_BLACK";

        $this->choice->properties[] = $this->property;

        return $this->choice;       
    }
}