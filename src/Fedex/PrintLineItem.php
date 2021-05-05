<?php 

namespace EXACTSports\FedEx; 

use EXACTSports\FedEx\Fedex\Document; 

class PrintLineItem
{
    public int $numberOfCopies; // number of copies
    public Document $document;

    public function __construct(Document $document)
    {
        $this->document = $document;
    }
}