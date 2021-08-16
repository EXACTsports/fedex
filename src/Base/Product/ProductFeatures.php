<?php 

namespace EXACTSports\FedEx\Base\Product;

use EXACTSports\FedEx\Base\Product\Feature;
use EXACTSports\FedEx\Base\Product\PaperSizes;
use EXACTSports\FedEx\Base\Product\PaperTypes;
use EXACTSports\FedEx\Base\Product\PaperColors;
use EXACTSports\FedEx\Base\Product\PaperSides;
use EXACTSports\FedEx\Base\Product\PaperOrientations;

class ProductFeatures
{
    public Feature $feature;
    public PaperSizes $paperSizes;
    public PaperTypes $paperTypes; 
    public PaperColors $paperColors;
    public PaperSides $paperSides; 
    public PaperOrientations $paperOrientations;

    public function __construct()
    {
        $this->feature = new Feature();
        $this->paperSizes = new PaperSizes();
        $this->paperTypes = new PaperTypes();
        $this->paperColors = new PaperColors();
        $this->paperSides = new PaperSides();
        $this->paperOrientations = new PaperOrientations();
    }

    /**
     * Get all product features
     */
    public function get()
    {
        $features = []; 
        $features = array(
            "1448981549109" => array(
                "name" => "Paper Size",
                "choices" => array(
                    "1448986650332" => $this->paperSizes->get85x11(),
                    "1448986650652" => $this->paperSizes->get85x14(),
                    "1448986651164" => $this->paperSizes->get11x17()
                ) 
            ),
            "1448981549741" => array(
                "name" => "Paper Type",
                "choices" => array(
                    "1448988661630" => $this->paperTypes->get24lb(),
                    "1448988664295" => $this->paperTypes->get32lb(),
                    "1448988665655" => $this->paperTypes->getLaserRecycled24lb(),
                    "1448988666102" => $this->paperTypes->get30Recycled20lb(),
                    '1448988666494' => $this->paperTypes->get100Recycled20lb(),
                    "1448988665015" => $this->paperTypes->getLaser60lb(),
                    "1448988895624" => $this->paperTypes->getGloss100lb(),
                    "1448988677979" => $this->paperTypes->getLaser80lb(),
                    '1448988675190' => $this->paperTypes->getIndex110lb(),
                    '1448988908744' => $this->paperTypes->getPureWhite100(),
                    "1448988666879" => $this->paperTypes->getGlossText32lb(),
                    '1448988908007' => $this->paperTypes->getUltraBrightWhite32(),
                    "1559837164426" => $this->paperTypes->getWaterResistant(),
                    "1450369886752" => $this->paperTypes->getIvory65lb(),
                    "1448988667606" => $this->paperTypes->getIvory24lb(),
                    "1448988671383" => $this->paperTypes->getSunYellow24lb(),
                    "1448988673318" => $this->paperTypes->getUltraBlue24lb(),
                    "1448988899767" => $this->paperTypes->getSandStone24lb()
                )
            ),
            "1448981549581" => array(
                "name" => "Print Color",
                "choices" => array(
                    "1448988600611" => $this->paperColors->getFullColor(),
                    "1448988600931" => $this->paperColors->getBlackWhite(),
                    "1448988601203" => $this->paperColors->getFirstPageColorRemainBlackWhite()
                )
            ),
            "1448981549269" => array(
                "name"  => "Sides", 
                "choices" => array(
                    "1448988124560" => $this->paperSides->getSingleSided(),
                    "1448988124807" => $this->paperSides->geDoubleSided()
                )
            ),
            "1448984679218" => array(
                "name" => "Orientation",
                "choices" => array(
                    "1449000016192" => $this->paperOrientations->getVertical(),
                    "1449000016327" => $this->paperOrientations->getHorizontal()
                )
            ),
            "1448981554101" => array(
                "name" => "Prints Per Page",
                "choices" => array(
                    "1448990257151" => $this->binding->getPrintsPerPageOne()
                ) 
            ),
            "1448981554597" => array(
                "name" => "Binding",
                "choices" => array(
                    "1452632212741" => $this->binding->getTopLeftStaple()
                ) 
            )
        );

        return $features;
    }
}