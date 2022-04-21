<?php

namespace EXACTSports\FedEx\Base\Product;

use JetBrains\PhpStorm\Pure;

class PaperTypes
{
    #[Pure]
    public function get24lb(): Choice
    {
        $choice = new Choice();
        $choice->id = '1448988661630';
        $choice->name = 'Laser(24 lb.)';

        $property = new Property();
        $property->id = '1450324098012';
        $property->name = 'MEDIA_TYPE';
        $property->value = 'LZ';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1453234015081';
        $property->name = 'PAPER_COLOR';
        $property->value = '#FFFFFF';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1471275182312';
        $property->name = 'MEDIA_CATEGORY';
        $property->value = 'PASTEL_BRIGHTS';

        $choice->properties[] = $property;

        return $choice;
    }

    #[Pure]
    public function get32lb(): Choice
    {
        $choice = new Choice();
        $choice->id = '1448988664295';
        $choice->name = 'Laser (32 lb.)';

        $property = new Property();
        $property->id = '1450324098012';
        $property->name = 'MEDIA_TYPE';
        $property->value = 'E32';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1453234015081';
        $property->name = 'PAPER_COLOR';
        $property->value = '#FFFFFF';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1471275182312';
        $property->name = 'MEDIA_CATEGORY';
        $property->value = 'RESUME';

        $choice->properties[] = $property;

        return $choice;
    }

    #[Pure]
    public function getLaserRecycled24lb(): Choice
    {
        $choice = new Choice();
        $choice->id = '1448988665655';
        $choice->name = 'Laser Recycled(24 lb.)';

        $property = new Property();
        $property->id = '1450324098012';
        $property->name = 'MEDIA_TYPE';
        $property->value = 'LZR';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1453234015081';
        $property->name = 'PAPER_COLOR';
        $property->value = '#FFFFFF';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1471275182312';
        $property->name = 'MEDIA_CATEGORY';
        $property->value = 'STANDARD';

        $choice->properties[] = $property;

        return $choice;
    }

    #[Pure]
    public function get30Recycled20lb(): Choice
    {
        $choice = new Choice();
        $choice->id = '1448988666102';
        $choice->name = '30% Recycled';

        $property = new Property();
        $property->id = '1450324098012';
        $property->name = 'MEDIA_TYPE';
        $property->value = 'WR';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1453234015081';
        $property->name = 'PAPER_COLOR';
        $property->value = '#FFFFFF';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1471275182312';
        $property->name = 'MEDIA_CATEGORY';
        $property->value = 'STANDARD';

        $choice->properties[] = $property;

        return $choice;
    }

    #[Pure]
    public function get100Recycled20lb(): Choice
    {
        $choice = new Choice();
        $choice->id = '1448988666494';
        $choice->name = '100% Recycled';

        $property = new Property();
        $property->id = '1450324098012';
        $property->name = 'MEDIA_TYPE';
        $property->value = 'R100';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1453234015081';
        $property->name = 'PAPER_COLOR';
        $property->value = '#FFFFFF';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1471275182312';
        $property->name = 'MEDIA_CATEGORY';
        $property->value = 'STANDARD';

        $choice->properties[] = $property;

        return $choice;
    }

    #[Pure]
    public function getLaser60lb(): Choice
    {
        $choice = new Choice();
        $choice->id = '1448988665015';
        $choice->name = 'Laser (60 lb.)';

        $property = new Property();
        $property->id = '1450324098012';
        $property->name = 'MEDIA_TYPE';
        $property->value = 'LZ60';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1453234015081';
        $property->name = 'PAPER_COLOR';
        $property->value = '#FFFFFF';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1471275182312';
        $property->name = 'MEDIA_CATEGORY';
        $property->value = 'STANDARD';

        $choice->properties[] = $property;

        return $choice;
    }

    #[Pure]
    public function getGloss100lb(): Choice
    {
        $choice = new Choice();
        $choice->id = '1448988895624';
        $choice->name = 'Gloss Cover';

        $property = new Property();
        $property->id = '1450324098012';
        $property->name = 'MEDIA_TYPE';
        $property->value = 'CC2';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1453234015081';
        $property->name = 'PAPER_COLOR';
        $property->value = '#FFFFFF';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1471275182312';
        $property->name = 'MEDIA_CATEGORY';
        $property->value = 'COVER_GLOSS';

        $choice->properties[] = $property;

        return $choice;
    }

    #[Pure]
    public function getLaser80lb(): Choice
    {
        $choice = new Choice();
        $choice->id = '1448988677979';
        $choice->name = 'Laser(80 lb.)';

        $property = new Property();
        $property->id = '1450324098012';
        $property->name = 'MEDIA_TYPE';
        $property->value = 'LZ80';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1453234015081';
        $property->name = 'PAPER_COLOR';
        $property->value = '#FFFFFF';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1471275182312';
        $property->name = 'MEDIA_CATEGORY';
        $property->value = 'TEXT_GLOSS';

        $choice->properties[] = $property;

        return $choice;
    }

    #[Pure]
    public function getIndex110lb(): Choice
    {
        $choice = new Choice();
        $choice->id = '1448988675190';
        $choice->name = '110lb. Index';

        $property = new Property();
        $property->id = '1450324098012';
        $property->name = 'MEDIA_TYPE';
        $property->value = 'W110';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1453234015081';
        $property->name = 'PAPER_COLOR';
        $property->value = '#FFFFFF';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1471275182312';
        $property->name = 'MEDIA_CATEGORY';
        $property->value = 'TEXT_GLOSS';

        $choice->properties[] = $property;

        return $choice;
    }

    #[Pure]
    public function getPureWhite100(): Choice
    {
        $choice = new Choice();
        $choice->id = '1448988908744';
        $choice->name = 'Pure White(100% Cotton)';

        $property = new Property();
        $property->id = '1450324098012';
        $property->name = 'MEDIA_TYPE';
        $property->value = 'E1';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1453234015081';
        $property->name = 'PAPER_COLOR';
        $property->value = '#FFFFFF';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1471275182312';
        $property->name = 'MEDIA_CATEGORY';
        $property->value = 'RESUME';

        $choice->properties[] = $property;

        return $choice;
    }

    #[Pure]
    public function getGlossText32lb(): Choice
    {
        $choice = new Choice();
        $choice->id = '1448988666879';
        $choice->name = 'Gloss Text';

        $property = new Property();
        $property->id = '1450324098012';
        $property->name = 'MEDIA_TYPE';
        $property->value = 'CT';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1453234015081';
        $property->name = 'PAPER_COLOR';
        $property->value = '#FFFFFF';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1471275182312';
        $property->name = 'MEDIA_CATEGORY';
        $property->value = 'TEXT_GLOSS';

        $choice->properties[] = $property;

        return $choice;
    }

    #[Pure]
    public function getUltraBrightWhite32(): Choice
    {
        $choice = new Choice();
        $choice->id = '1448988908007';
        $choice->name = 'Ultra Bright White';

        $property = new Property();
        $property->id = '1450324098012';
        $property->name = 'MEDIA_TYPE';
        $property->value = 'E0';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1453234015081';
        $property->name = 'PAPER_COLOR';
        $property->value = '#FFFFFF';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1471275182312';
        $property->name = 'MEDIA_CATEGORY';
        $property->value = 'RESUME';

        $choice->properties[] = $property;

        return $choice;
    }

    #[Pure]
    public function getWaterResistant(): Choice
    {
        $choice = new Choice();
        $choice->id = '1559837164426';
        $choice->name = 'Water Resistant';

        $property = new Property();
        $property->id = '1450324098012';
        $property->name = 'MEDIA_TYPE';
        $property->value = 'E6';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1453234015081';
        $property->name = 'PAPER_COLOR';
        $property->value = '#FFFFFF';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1471275182312';
        $property->name = 'MEDIA_CATEGORY';
        $property->value = 'CARDSTOCK';

        $choice->properties[] = $property;

        return $choice;
    }

    #[Pure]
    public function getIvory65lb(): Choice
    {
        $choice = new Choice();
        $choice->id = '1450369886752';
        $choice->name = 'Ivory';

        $property = new Property();
        $property->id = '1450324098012';
        $property->name = 'MEDIA_TYPE';
        $property->value = 'PC1';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1453234015081';
        $property->name = 'PAPER_COLOR';
        $property->value = '#F5EFDF';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1471275182312';
        $property->name = 'MEDIA_CATEGORY';
        $property->value = 'CARDSTOCK';

        $choice->properties[] = $property;

        return $choice;
    }

    #[Pure]
    public function getCanary65Lb(): Choice
    {
        $choice = new Choice();
        $choice->id = '1450369912077';
        $choice->name = 'Canary';

        $property = new Property();
        $property->id = '1450324098012';
        $property->name = 'MEDIA_TYPE';
        $property->value = 'PC2';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1453234015081';
        $property->name = 'PAPER_COLOR';
        $property->value = '#F8E998';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1471275182312';
        $property->name = 'MEDIA_CATEGORY';
        $property->value = 'CARDSTOCK';

        $choice->properties[] = $property;

        return $choice;
    }

    #[Pure]
    public function getIvory24lb(): Choice
    {
        $choice = new Choice();
        $choice->id = '1448988667606';
        $choice->name = 'Ivory';

        $property = new Property();
        $property->id = '1450324098012';
        $property->name = 'MEDIA_TYPE';
        $property->value = 'P1';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1453234015081';
        $property->name = 'PAPER_COLOR';
        $property->value = '#F5EFDF';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1471275182312';
        $property->name = 'MEDIA_CATEGORY';
        $property->value = 'PASTEL_BRIGHTS';

        $choice->properties[] = $property;

        return $choice;
    }


    #[Pure]
    public function getCanary24lb(): Choice
    {
        $choice = new Choice();
        $choice->id = '1448988668006';
        $choice->name = 'Canary';

        $property = new Property();
        $property->id = '1450324098012';
        $property->name = 'MEDIA_TYPE';
        $property->value = 'P2';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1453234015081';
        $property->name = 'PAPER_COLOR';
        $property->value = '#F8E998';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1471275182312';
        $property->name = 'MEDIA_CATEGORY';
        $property->value = 'PASTEL_BRIGHTS';

        $choice->properties[] = $property;

        return $choice;
    }

    #[Pure]
    public function getSunYellow24lb(): Choice
    {
        $choice = new Choice();
        $choice->id = '1448988671383';
        $choice->name = 'Sun Yellow';

        $property = new Property();
        $property->id = '1450324098012';
        $property->name = 'MEDIA_TYPE';
        $property->value = 'B2';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1453234015081';
        $property->name = 'PAPER_COLOR';
        $property->value = '#F8D61B';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1471275182312';
        $property->name = 'MEDIA_CATEGORY';
        $property->value = 'PASTEL_BRIGHTS';

        $choice->properties[] = $property;

        return $choice;
    }

    #[Pure]
    public function getUltraBlue24lb(): Choice
    {
        $choice = new Choice();
        $choice->id = '1448988673318';
        $choice->name = 'Bright Blue';

        $property = new Property();
        $property->id = '1450324098012';
        $property->name = 'MEDIA_TYPE';
        $property->value = 'B9';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1453234015081';
        $property->name = 'PAPER_COLOR';
        $property->value = '#00A9CA';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1471275182312';
        $property->name = 'MEDIA_CATEGORY';
        $property->value = 'PASTEL_BRIGHTS';

        $choice->properties[] = $property;

        return $choice;
    }

    #[Pure]
    public function getSandStone24lb(): Choice
    {
        $choice = new Choice();
        $choice->id = '1448988899767';
        $choice->name = 'Sand Stone';

        $property = new Property();
        $property->id = '1450324098012';
        $property->name = 'MEDIA_TYPE';
        $property->value = 'R2';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1453234015081';
        $property->name = 'PAPER_COLOR';
        $property->value = '#D9D7D4';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1471275182312';
        $property->name = 'MEDIA_CATEGORY';
        $property->value = 'RESUME';

        $choice->properties[] = $property;

        return $choice;
    }
}
