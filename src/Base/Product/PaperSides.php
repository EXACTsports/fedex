<?php 

namespace EXACTSports\FedEx\Base\Product;

use EXACTSports\FedEx\Base\Product\Choice;
use EXACTSports\FedEx\Base\Product\Property;

class PaperSides
{
    public Choice $choice;
    public Property $property; 

    public function __construct(Choice $choice, Property $property)
    {
        $this->choice = $choice;
        $this->property = $property;
    }

    /**
     * GETS single sided
     */
    public function getSingleSided()
    {
        $this->choice->id = "1448988124560";
        $this->choice->name = "Single-Sided";

        $this->property->id = "1461774376168";
        $this->property->name = "SIDE";
        $this->property->value = "SINGLE";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1471294217799";
        $this->property->name = "SIDE_VALUE";
        $this->property->value = "1";

        $this->choice->properties[] = $this->property;
  
        return $this->choice;       
    }

    /**
     * Gets double sided
     */
    public function geDoubleSided()
    {
        $this->choice->id = "1448988124807";
        $this->choice->name = "Double-Sided";

        $this->property->id = "1461774376168";
        $this->property->name = "SIDE";
        $this->property->value = "DOUBLE";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1471294217799";
        $this->property->name = "SIDE_VALUE";
        $this->property->value = "2";

        $this->choice->properties[] = $this->property;
  
        return $this->choice;       
    }
}