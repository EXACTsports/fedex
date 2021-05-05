<?php 

namespace EXACTSports\FedEx;

use EXACTSports\FedEx\Fedex\Sections;

class Document
{
    public string|null $name; // document name
    public Sections|array $sections = [];
}