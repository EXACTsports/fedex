<?php 

namespace EXACTSports\FedEx\Base\Product;

use EXACTSports\FedEx\Base\Product\Choice;
use EXACTSports\FedEx\Base\Product\Property;

class PaperSizes 
{
    /**
     * Gets 85x11
     */
    public function get85x11()
    {
        $choice = new Choice();
        $choice->id = "1448986650332";
        $choice->name = "8.5x11";
        
        $property = new Property();
        $property->id = "1449069906033";
        $property->name = "MEDIA_HEIGHT";
        $property->value = "11";

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = "1449069908929";
        $property->name = "MEDIA_WIDTH";
        $property->value = "8.5";

        $choice->properties[] = $property;

        return $choice;        
    }

    /**
     * Gets 85x14
     */
    public function get85x14()
    {
        $choice = new Choice();
        $choice->id = "1448986650652";
        $choice->name = "8.5x14";

        $property = new Property();
        $property->id = "1449069906033";
        $property->name = "MEDIA_HEIGHT";
        $property->value = "14";

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = "1449069908929";
        $property->name = "MEDIA_WIDTH";
        $property->value = "8.5";

        $choice->properties[] = $property;

        return $choice;        
    }

    /**
     * Gets 11x17
     */
    public function get11x17()
    {
        $choice = new Choice();
        $choice->id = "1448986651164";
        $choice->name = "11x17";

        $property = new Property();
        $property->id = "1449069906033";
        $property->name = "MEDIA_HEIGHT";
        $property->value = "17";

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = "1449069908929";
        $property->name = "MEDIA_WIDTH";
        $property->value = "11";

        $choice->properties[] = $property;

        return $choice;        
    }
}