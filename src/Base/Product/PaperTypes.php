<?php 

namespace EXACTSports\FedEx\Base\Product;

use EXACTSports\FedEx\Base\Product\Choice;

class PaperTypes
{
    public Choice $choice; 
    
    public function __construct(Choice $choice)
    {
        $this->choice = $choice;
    }

    /**
     * Gets 24 lb
     */
    public function get24lb()
    {
        $this->choice->id = "1448988661630";
        $this->choice->name = "Laser(24 lb.)";

        $this->property->id = "1450324098012";
        $this->property->name = "MEDIA_TYPE";
        $this->property->value = "LZ";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1453234015081";
        $this->property->name = "PAPER_COLOR";
        $this->property->value = "#FFFFFF";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1471275182312";
        $this->property->name = "MEDIA_CATEGORY";
        $this->property->value = "PASTEL_BRIGHTS";

        $this->choice->properties[] = $this->property;

        return $this->choice;       
    }

    /**
     * Gets 32 lb
     */
    public function get32lb()
    {
        $this->choice->id = "1448988664295";
        $this->choice->name = "Laser (32 lb.)";

        $this->property->id = "1450324098012";
        $this->property->name = "MEDIA_TYPE";
        $this->property->value = "E32";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1453234015081";
        $this->property->name = "PAPER_COLOR";
        $this->property->value = "#FFFFFF";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1471275182312";
        $this->property->name = "MEDIA_CATEGORY";
        $this->property->value = "RESUME";

        $this->choice->properties[] = $this->property;

        return $this->choice;          
    }

    /**
     * Gets 20 lb
     */
    public function get20lb()
    {
        $this->choice->id = "1448988666102";
        $this->choice->name = "30% Recycled";

        $this->property->id = "1450324098012";
        $this->property->name = "MEDIA_TYPE";
        $this->property->value = "WR";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1453234015081";
        $this->property->name = "PAPER_COLOR";
        $this->property->value = "#FFFFFF";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1471275182312";
        $this->property->name = "MEDIA_CATEGORY";
        $this->property->value = "STANDARD";

        $this->choice->properties[] = $this->property;

        return $this->choice;          
    }

    /**
     * Gets laser 60lb
     */
    public function getLaser60lb()
    {
        $this->choice->id = "1448988665015";
        $this->choice->name = "Laser (60 lb.)";

        $this->property->id = "1450324098012";
        $this->property->name = "MEDIA_TYPE";
        $this->property->value = "LZ60";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1453234015081";
        $this->property->name = "PAPER_COLOR";
        $this->property->value = "#FFFFFF";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1471275182312";
        $this->property->name = "MEDIA_CATEGORY";
        $this->property->value = "STANDARD";

        $this->choice->properties[] = $this->property;

        return $this->choice;     
    }

    /**
     * Gets gloss 100 lb
     */
    public function getGloss100lb()
    {
        $this->choice->id = "1448988895624";
        $this->choice->name = "Gloss Cover";

        $this->property->id = "1450324098012";
        $this->property->name = "MEDIA_TYPE";
        $this->property->value = "CC2";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1453234015081";
        $this->property->name = "PAPER_COLOR";
        $this->property->value = "#FFFFFF";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1471275182312";
        $this->property->name = "MEDIA_CATEGORY";
        $this->property->value = "COVER_GLOSS";

        $this->choice->properties[] = $this->property;

        return $this->choice;     
    }

    /**
     * Gets laser 80 lb
     */
    public function getLaser80lb()
    {
        $this->choice->id = "1448988677979";
        $this->choice->name = "Laser(80 lb.)";

        $this->property->id = "1450324098012";
        $this->property->name = "MEDIA_TYPE";
        $this->property->value = "LZ80";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1453234015081";
        $this->property->name = "PAPER_COLOR";
        $this->property->value = "#FFFFFF";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1471275182312";
        $this->property->name = "MEDIA_CATEGORY";
        $this->property->value = "TEXT_GLOSS";

        $this->choice->properties[] = $this->property;

        return $this->choice;     
    }

    /**
     * Gets gloss text 32 lb
     */
    public function getGlossText32lb()
    {
        $this->choice->id = "1448988666879";
        $this->choice->name = "Gloss Text";

        $this->property->id = "1450324098012";
        $this->property->name = "MEDIA_TYPE";
        $this->property->value = "CT";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1453234015081";
        $this->property->name = "PAPER_COLOR";
        $this->property->value = "#FFFFFF";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1471275182312";
        $this->property->name = "MEDIA_CATEGORY";
        $this->property->value = "TEXT_GLOSS";

        $this->choice->properties[] = $this->property;

        return $this->choice;
    }

    /**
     * Gets water resistant
     */
    public function getWaterResistant()
    {
        $this->choice->id = "1559837164426";
        $this->choice->name = "Water Resistant";

        $this->property->id = "1450324098012";
        $this->property->name = "MEDIA_TYPE";
        $this->property->value = "E6";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1453234015081";
        $this->property->name = "PAPER_COLOR";
        $this->property->value = "#FFFFFF";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1471275182312";
        $this->property->name = "MEDIA_CATEGORY";
        $this->property->value = "CARDSTOCK";

        $this->choice->properties[] = $this->property;

        return $this->choice;
    }

    /**
     * Gets ivory 65 lb
     */
    public function getIvory65lb()
    {
        $this->choice->id = "1450369886752";
        $this->choice->name = "Ivory";

        $this->property->id = "1450324098012";
        $this->property->name = "MEDIA_TYPE";
        $this->property->value = "PC1";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1453234015081";
        $this->property->name = "PAPER_COLOR";
        $this->property->value = "#F5EFDF";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1471275182312";
        $this->property->name = "MEDIA_CATEGORY";
        $this->property->value = "CARDSTOCK";

        $this->choice->properties[] = $this->property;

        return $this->choice;
    }

    /**
     * Gets ivory 24 lb
     */
    public function getIvory24lb()
    {
        $this->choice->id = "1448988667606";
        $this->choice->name = "Ivory";

        $this->property->id = "1450324098012";
        $this->property->name = "MEDIA_TYPE";
        $this->property->value = "P1";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1453234015081";
        $this->property->name = "PAPER_COLOR";
        $this->property->value = "#F5EFDF";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1471275182312";
        $this->property->name = "MEDIA_CATEGORY";
        $this->property->value = "PASTEL_BRIGHTS";

        $this->choice->properties[] = $this->property;

        return $this->choice;
    }

    /**
     * Gets sun yellow 24 lb
     */
    public function getSunYellow24lb()
    {
        $this->choice->id = "1448988671383";
        $this->choice->name = "Sun Yellow";

        $this->property->id = "1450324098012";
        $this->property->name = "MEDIA_TYPE";
        $this->property->value = "B2";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1453234015081";
        $this->property->name = "PAPER_COLOR";
        $this->property->value = "#F8D61B";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1471275182312";
        $this->property->name = "MEDIA_CATEGORY";
        $this->property->value = "PASTEL_BRIGHTS";

        $this->choice->properties[] = $this->property;

        return $this->choice;
    }

    /**
     * Gets ultra blue 24 lb
     */
    public function getUltraBlue24lb()
    {
        $this->choice->id = "1448988673318";
        $this->choice->name = "Bright Blue";

        $this->property->id = "1450324098012";
        $this->property->name = "MEDIA_TYPE";
        $this->property->value = "B9";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1453234015081";
        $this->property->name = "PAPER_COLOR";
        $this->property->value = "#00A9CA";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1471275182312";
        $this->property->name = "MEDIA_CATEGORY";
        $this->property->value = "PASTEL_BRIGHTS";

        $this->choice->properties[] = $this->property;

        return $this->choice;
    }

    /**
     * Gets sand stone 24 lb
     */
    public function getSandStone24lb()
    {
        $this->choice->id = "1448988899767";
        $this->choice->name = "Sand Stone";

        $this->property->id = "1450324098012";
        $this->property->name = "MEDIA_TYPE";
        $this->property->value = "R2";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1453234015081";
        $this->property->name = "PAPER_COLOR";
        $this->property->value = "#D9D7D4";

        $this->choice->properties[] = $this->property;

        $this->property->id = "1471275182312";
        $this->property->name = "MEDIA_CATEGORY";
        $this->property->value = "RESUME";

        $this->choice->properties[] = $this->property;

        return $this->choice;
    }
}