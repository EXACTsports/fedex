<?php 

namespace EXACTSports\FedEx\Base\Product;

use EXACTSports\FedEx\Base\Product\Choice;

class PaperSizes 
{
    public Choice $choice; 
    
    public function __construct(Choice $choice)
    {
        $this->choice = $choice;
    }

    /**
     * Gets 85x11
     */
    public function get85x11()
    {
        $properties = [];
        $this->choice->id = "1448986650332";
        $this->choice->name = "8.5x11";

        $this->property->id = "1449069906033";
        $this->property->name = "MEDIA_HEIGHT";
        $this->property->value = "11";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1449069908929";
        $this->property->name = "MEDIA_WIDTH";
        $this->property->value = "8.5";

        $this->choice->properties[] = $this->property;

        return $this->choice;        
    }

    /**
     * Gets 85x14
     */
    public function get85x14()
    {
        $properties = [];
        $this->choice->id = "1448986650652";
        $this->choice->name = "8.5x14";

        $this->property->id = "1449069906033";
        $this->property->name = "MEDIA_HEIGHT";
        $this->property->value = "14";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1449069908929";
        $this->property->name = "MEDIA_WIDTH";
        $this->property->value = "8.5";

        $this->choice->properties[] = $this->property;

        return $this->choice;        
    }

    /**
     * Gets 11x17
     */
    public function get11x17()
    {
        $properties = [];
        $this->choice->id = "1448986651164";
        $this->choice->name = "11x17";

        $this->property->id = "1449069906033";
        $this->property->name = "MEDIA_HEIGHT";
        $this->property->value = "17";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1449069908929";
        $this->property->name = "MEDIA_WIDTH";
        $this->property->value = "11";

        $this->choice->properties[] = $this->property;

        return $this->choice;        
    }
}