<?php

namespace EXACTSports\FedEx\Base\Product;

use JetBrains\PhpStorm\Pure;

class ProductFeatures
{
    public Feature $feature;

    public PaperSizes $paperSizes;

    public PaperTypes $paperTypes;

    public PaperColors $paperColors;

    public PaperSides $paperSides;

    public PaperOrientations $paperOrientations;

    public PrintsPerPage $printsPerPage;

    public Binding $binding;

    #[Pure]
    public function __construct()
    {
        $this->feature = new Feature();
        $this->paperSizes = new PaperSizes();
        $this->paperTypes = new PaperTypes();
        $this->paperColors = new PaperColors();
        $this->paperSides = new PaperSides();
        $this->paperOrientations = new PaperOrientations();
        $this->printsPerPage = new PrintsPerPage();
        $this->binding = new Binding();
    }

    #[Pure]
    public function get(): array
    {
        return [
            '1448981549109' => [
                'name' => 'Paper Size',
                'choices' => [
                    '1448986650332' => $this->paperSizes->get85x11(),
                    '1448986650652' => $this->paperSizes->get85x14(),
                    '1448986651164' => $this->paperSizes->get11x17(),
                ],
            ],
            '1448981549741' => [
                'name' => 'Paper Type',
                'choices' => [
                    '1448988661630' => $this->paperTypes->get24lb(),
                    '1448988664295' => $this->paperTypes->get32lb(),
                    '1448988665655' => $this->paperTypes->getLaserRecycled24lb(),
                    '1448988666102' => $this->paperTypes->get30Recycled20lb(),
                    '1448988666494' => $this->paperTypes->get100Recycled20lb(),
                    '1448988665015' => $this->paperTypes->getLaser60lb(),
                    '1448988895624' => $this->paperTypes->getGloss100lb(),
                    '1448988677979' => $this->paperTypes->getLaser80lb(),
                    '1448988675190' => $this->paperTypes->getIndex110lb(),
                    '1448988908744' => $this->paperTypes->getPureWhite100(),
                    '1448988666879' => $this->paperTypes->getGlossText32lb(),
                    '1448988908007' => $this->paperTypes->getUltraBrightWhite32(),
                    '1559837164426' => $this->paperTypes->getWaterResistant(),
                    '1450369886752' => $this->paperTypes->getIvory65lb(),
                    '1448988667606' => $this->paperTypes->getIvory24lb(),
                    '1448988671383' => $this->paperTypes->getSunYellow24lb(),
                    '1448988673318' => $this->paperTypes->getUltraBlue24lb(),
                    '1448988899767' => $this->paperTypes->getSandStone24lb(),
                ],
            ],
            '1448981549581' => [
                'name' => 'Print Color',
                'choices' => [
                    '1448988600611' => $this->paperColors->getFullColor(),
                    '1448988600931' => $this->paperColors->getBlackWhite(),
                    '1448988601203' => $this->paperColors->getFirstPageColorRemainBlackWhite(),
                ],
            ],
            '1448981549269' => [
                'name'  => 'Sides',
                'choices' => [
                    '1448988124560' => $this->paperSides->getSingleSided(),
                    '1448988124807' => $this->paperSides->geDoubleSided(),
                ],
            ],
            '1448984679218' => [
                'name' => 'Orientation',
                'choices' => [
                    '1449000016192' => $this->paperOrientations->getVertical(),
                    '1449000016327' => $this->paperOrientations->getHorizontal(),
                ],
            ],
            '1448981554101' => [
                'name' => 'Prints Per Page',
                'choices' => [
                    '1448990257151' => $this->printsPerPage->getPrintsPerPageOne(),
                ],
            ],
            '1448981554597' => [
                'name' => 'Binding',
                'choices' => [
                    '1452632212741' => $this->binding->getTopLeftStaple(),
                ],
            ],
        ];
    }

    #[Pure]
    public function getBaseFeatures(array $options = []): array
    {
        $features = [];
        $allFeatures = $this->get();

        // Paper size
        $properties = [];

        if (! array_key_exists('1448981549109', $options) || ! isset($options['1448981549109']['selected'])) {
            $properties[] = new Property('1449069906033', 'MEDIA_HEIGHT', '11');
            $properties[] = new Property('1449069908929', 'MEDIA_WIDTH', '8.5');
            $choice = new Choice('1448986650332', '8.5x11', $properties);
        } else {
            $choice = $allFeatures['1448981549109']['choices'][$options['1448981549109']['selected']];
        }

        $features[] = new Feature('1448981549109', 'Paper Size', $choice);

        // Paper type
        $properties = [];

        if (! array_key_exists('1448981549741', $options) || ! isset($options['1448981549109']['selected'])) {
            $properties[] = new Property('1450324098012', 'MEDIA_TYPE', 'E32');
            $properties[] = new Property('1453234015081', 'PAPER_COLOR', '#FFFFFF');
            $properties[] = new Property('1471275182312', 'MEDIA_CATEGORY', 'RESUME');
            $choice = new Choice('1448988664295', 'Laser (32 lb.)', $properties);
        } else {
            $choice = $allFeatures['1448981549741']['choices'][$options['1448981549741']['selected']];
        }

        $features[] = new Feature('1448981549741', 'Paper Type', $choice);

        // Print color
        $properties = [];

        if (! array_key_exists('1448981549581', $options) || ! isset($options['1448981549581']['selected'])) {
            $properties[] = new Property('1453242778807', 'PRINT_COLOR', 'COLOR');
            $choice = new Choice('1448988600611', 'Full Color', $properties);
        } else {
            $choice = $allFeatures['1448981549581']['choices'][$options['1448981549581']['selected']];
        }

        $features[] = new Feature('1448981549581', 'Print Color', $choice);

        // Sides
        $properties = [];

        if (! array_key_exists('1448981549269', $options) || ! isset($options['1448981549269']['selected'])) {
            $properties[] = new Property('1461774376168', 'SIDE', 'SINGLE');
            $properties[] = new Property('1471294217799', 'SIDE_VALUE', '1');
            $choice = new Choice('1448988124560', 'Single-Sided', $properties);
        } else {
            $choice = $allFeatures['1448981549269']['choices'][$options['1448981549269']['selected']];
        }

        $features[] = new Feature('1448981549269', 'Sides', $choice);

        // Orientation
        $properties = [];

        if (! array_key_exists('1448984679218', $options) || ! isset($options['1448984679218']['selected'])) {
            $properties[] = new Property('1453260266287', 'PAGE_ORIENTATION', 'PORTRAIT');
            $choice = new Choice('1449000016192', 'Vertical', $properties);
        } else {
            $choice = $allFeatures['1448984679218']['choices'][$options['1448984679218']['selected']];
        }

        $features[] = new Feature('1448984679218', 'Orientation', $choice);

        // Prints per page
        $properties = [];

        if (! array_key_exists('1448981554101', $options) || ! isset($options['1448981554101']['selected'])) {
            $properties[] = new Property('1455387404922', 'PRINTS_PER_PAGE', 'ONE');
            $choice = new Choice('1448990257151', 'One', $properties);
        } else {
            $choice = $allFeatures['1448981554101']['choices'][$options['1448981554101']['selected']];
        }

        $features[] = new Feature('1448981554101', 'Prints Per Page', $choice);

        // Cutting
        $properties = [];

        if (! array_key_exists('1448984877869', $options) || ! isset($options['1448984877869']['selected'])) {
            $choice = new Choice('1448999392195', 'None', []);
        } else {
            $choice = $allFeatures['1448984877869']['choices'][$options['1448984877869']['selected']];
        }

        $features[] = new Feature('1448984877869', 'Cutting', $choice);

        // Hole punching
        $properties = [];

        if (! array_key_exists('1448981555573', $options) || ! isset($options['1448981555573']['selected'])) {
            $choice = new Choice('1448999902070', 'None', []);
        } else {
            $choice = $allFeatures['1448981555573']['choices'][$options['1448981555573']['selected']];
        }

        $features[] = new Feature('1448981555573', 'Hole Punching', $choice);
        
        // Folding
        $properties = [];

        if (! array_key_exists('1448984877645', $options) || ! isset($options['1448984877645']['selected'])) {
            $choice = new Choice('1448999720595', 'None', []);
        } else {
            $choice = $allFeatures['1448984877645']['choices'][$options['1448984877645']['selected']];
        }

        $features[] = new Feature('1448984877645', 'Folding', $choice);
        

        // Collation
        $properties = [];

        if (! array_key_exists('1448981532145', $options) || ! isset($options['1448981532145']['selected'])) {
            $properties[] = new Property('1449069945785', 'COLLATION_TYPE', 'MACHINE');
            $choice = new Choice('1448986654687', 'Collated', $properties);
        } else {
            $choice = $allFeatures['1448981532145']['choices'][$options['1448981532145']['selected']];
        }

        $features[] = new Feature('1448981532145', 'Collation', $choice);

        // Binding
        $properties = [];

        if (! array_key_exists('1448981554597', $options) || ! isset($options['1448981554597']['selected'])) {
            $choice = new Choice('1448997199553', 'None', []);
        } else {
            $choice = $allFeatures['1448981554597']['choices'][$options['1448981554597']['selected']];
        }

        $features[] = new Feature('1448981554597', 'Binding', $choice);

        // Lamination
        $properties = [];

        if (! array_key_exists('1448984679442', $options) || ! isset($options['1448984679442']['selected'])) {
            $choice = new Choice('1448999458409', 'None', []);
        } else {
            $choice = $allFeatures['1448984679442']['choices'][$options['1448984679442']['selected']];
        }

        $features[] = new Feature('1448984679442', 'Lamination', $choice);

        return $features;
    }
}
