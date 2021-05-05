<?php 

namespace EXACTSports\FedEx;

use EXACTSports\FedEx\Fedex\SectionMedialDetail;

class Section 
{
    public string|null $uploadSessionId; // your upload session id
    public string|null $fileToken; // your file token
    public string|null $printType; // print type, for example BLACK_AND_WHITE
    public string|null $numberOfSides; // number of sides, for example, SINGLE
    public SectionMedialDetail $sectionMediaDetail;

    public function __construct(SectionMedialDetail $sectionMediaDetail)
    {
        $this->sectionMediaDetail = $sectionMediaDetail;
    }
} 