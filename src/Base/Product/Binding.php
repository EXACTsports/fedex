<?php

namespace EXACTSports\FedEx\Base\Product;

class Binding
{
    public function getTopLeftStaple(): \EXACTSports\FedEx\Base\Product\Choice
    {
        $choice = new Choice();
        $choice->id = '1452632212741';
        $choice->name = 'Staple';

        $property = new Property();
        $property->id = '1452632433829';
        $property->name = 'STAPLE';
        $property->value = 'TOP_LEFT_STAPLED';

        $choice->properties[] = $property;

        $property = new Property();
        $property->id = '1518630200198';
        $property->name = 'STAPLE_TYPE';
        $property->value = 'MACHINE';

        $choice->properties[] = $property;

        return $choice;
    }
}
