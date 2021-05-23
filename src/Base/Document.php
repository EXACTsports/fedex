<?php 

namespace EXACTSports\FedEx\Base;

use EXACTSports\FedEx\Base\Sections;

class Document
{
    public string|null $name; // document name
    public Sections|array $sections = [];
}