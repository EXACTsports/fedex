<?php 

namespace EXACTSports\FedEx\Base\Product;

use EXACTSports\FedEx\Base\Product\Choice;
use EXACTSports\FedEx\Base\Product\Property;

class PaperColor
{
    public Choice $choice;
    public Property $property; 

    public function __construct(Choice $choice, Property $property)
    {
        $this->choice = $choice;
        $this->property = $property;
    }
    
    /**
     * Gets paper color options
     */
    public function getChoices()
    {  
        $choices = [];

        // Full color 
        // Black and white
        $this->choice->id = "1448988600931";
        $this->choice->name = "Black & White";

        $this->property->id = "1453242778807";
        $this->property->name = "PRINT_COLOR";
        $this->property->value = "B/W";

        $this->choice->properties[] = $this->property;

        // First page color, remaining pages Black and White

        $choices[] = $this->choice; 

        return $choices;
    }       
}