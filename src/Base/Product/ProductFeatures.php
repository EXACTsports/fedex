<?php 

namespace EXACTSports\FedEx\Base\Product;

use EXACTSports\FedEx\Base\Product\Feature;
use EXACTSports\FedEx\Base\Product\PaperSize;
use EXACTSports\FedEx\Base\Product\PaperType;
use EXACTSports\FedEx\Base\Product\PrintColor;

class ProductFeatures
{
    public Feature $feature;
    public PaperSize $paperSize;
    public PaperType $paperType; 
    public PrintColor $printColor;

    public function __construct(
        Feature $feature, 
        PaperSize $paperSize,
        PaperType $paperType, 
        PrintColor $printColor)
    {
        $this->feature = $feature;
        $this->paperSize = $paperSize;
        $this->paperType = $paperType;
        $this->printColor = $printColor;
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
                    "1448986650332" => $this->papeSize->get85x11(),
                    "1448986650652" => $this->papeSize->get85x14(),
                    "1448986651164" => $this->papeSize->get11x17()
                ) 
                ),
            "1448981549741" => array(
                "name" => "Paper Type",
                "choices" => array(
                    "1448988661630" => $this->paperType->get24lb(),
                    "1448988664295" => $this->paperType->get32lb(),
                    "1448988666102" => $this->paperType->get20lb(),
                    "1448988665015" => $this->paperType->getLaser60lb(),
                    "1448988895624" => $this->paperType->getGloss100lb(),
                    "1448988677979" => $this->paperType->getLaser80lb(),
                    "1448988666879" => $this->paperType->getGlossText32lb(),
                    "1559837164426" => $this->paperType->getWaterResistant(),
                    "1450369886752" => $this->paperType->getIvory65lb(),
                    "1448988667606" => $this->paperType->getIvory24lb(),
                    "1448988671383" => $this->paperType->getSunYellow24lb(),
                    "1448988673318" => $this->paperType->getUltraBlue24lb(),
                    "1448988899767" => $this->paperType->getSandStone24lb()
                )
            )
        );

        return $features;
    }
}