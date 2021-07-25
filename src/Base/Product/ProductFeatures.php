<?php 

namespace EXACTSports\FedEx\Base\Product;

use EXACTSports\FedEx\Base\Product\Feature;
use EXACTSports\FedEx\Base\Product\PaperSizes;
use EXACTSports\FedEx\Base\Product\PaperTypes;
use EXACTSports\FedEx\Base\Product\PrintColors;
use EXACTSports\FedEx\Base\Product\PaperSides;

class ProductFeatures
{
    public Feature $feature;
    public PaperSizes $paperSizes;
    public PaperTypes $paperTypes; 
    public PrintColors $printColors;
    public PaperSides $paperSides; 

    public function __construct(
        Feature $feature, 
        PaperSizes $paperSizes,
        PaperTypes $paperTypes, 
        PrintColors $printColors,
        PaperSides $paperSides)
    {
        $this->feature = $feature;
        $this->paperSizes = $paperSizes;
        $this->paperTypes = $paperTypes;
        $this->printColors = $printColors;
        $this->paperSides = $paperSides;
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
                    "1448986650332" => $this->papeSizes->get85x11(),
                    "1448986650652" => $this->papeSizes->get85x14(),
                    "1448986651164" => $this->papeSizes->get11x17()
                ) 
                ),
            "1448981549741" => array(
                "name" => "Paper Type",
                "choices" => array(
                    "1448988661630" => $this->paperTypes->get24lb(),
                    "1448988664295" => $this->paperTypes->get32lb(),
                    "1448988666102" => $this->paperTypes->get20lb(),
                    "1448988665015" => $this->paperTypes->getLaser60lb(),
                    "1448988895624" => $this->paperTypes->getGloss100lb(),
                    "1448988677979" => $this->paperTypes->getLaser80lb(),
                    "1448988666879" => $this->paperTypes->getGlossText32lb(),
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
                    "1448988600611" => $this->printColors->getFullColor(),
                    "1448988600931" => $this->printColors->getBlackWhite(),
                    "1448988601203" => $this->printColors->getFirstPageColorRemainBlackWhite()
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
            )
        );

        return $features;
    }
}