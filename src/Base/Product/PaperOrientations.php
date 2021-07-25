<?php 

namespace EXACTSports\FedEx\Base\Product;

use EXACTSports\FedEx\Base\Product\Choice;
use EXACTSports\FedEx\Base\Product\Property;

class PaperOrientations
{
    public Choice $choice;
    public Property $property; 

    public function __construct(Choice $choice, Property $property)
    {
        $this->choice = $choice;
        $this->property = $property;
    }

    /**
     * Gets vertical
     */
    public function getVertical()
    {
        $this->choice->id = "1449000016192";
        $this->choice->name = "Vertical";

        $this->property->id = "1453260266287";
        $this->property->name = "PAGE_ORIENTATION";
        $this->property->value = "PORTRAIT";

        $this->choice->properties[] = $this->property;

        return $this->choice;     
    }

    /**
     * Gets horizontal
     */
    public function getHorizontal()
    {
        $this->choice->id = "1449000016327";
        $this->choice->name = "Horizontal";

        $this->property->id = "1453260266287";
        $this->property->name = "PAGE_ORIENTATION";
        $this->property->value = "LANDSCAPE";

        $this->choice->properties[] = $this->property;

        return $this->choice;     
    }
}