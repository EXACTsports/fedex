<?php 

namespace EXACTSports\FedEx\Base; 

use EXACTSports\FedEx\Base\Document; 

class PrintLineItem
{
    public int $numberOfCopies; // number of copies
    public Document $document;

    public function __construct(Document $document = null)
    {  
        if (is_null($document)) {
            $document = new Document(); 
        }

        $this->document = $document;
    }
}