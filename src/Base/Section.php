<?php 

namespace EXACTSports\FedEx\Base;

use EXACTSports\FedEx\Base\SectionMediaDetail;

class Section 
{
    public string|null $uploadSessionId; // your upload session id
    public string|null $fileToken; // your file token
    public string|null $printType; // print type, for example BLACK_AND_WHITE
    public string|null $numberOfSides; // number of sides, for example, SINGLE
    public SectionMediaDetail $sectionMediaDetail;

    public function __construct(SectionMediaDetail $sectionMediaDetail = null)
    {
        if (is_null($sectionMediaDetail)) {
            $sectionMediaDetail = new SectionMediaDetail();
        }

        $this->sectionMediaDetail = $sectionMediaDetail;
    }
} 