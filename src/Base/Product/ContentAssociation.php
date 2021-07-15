<?php 

namespace EXACTSports\FedEx\Base\Product;

class ContentAssociation
{
    public string $parentContentReference;          // N - Unique ID assigned to the original file that was uploaded
    public string $contentReference;                // N - Unique ID assigned to the converted file that was uploaded
    public string $contentType;                     // N - Type of file that was uploaded (ex. WORD)
    public string $fileName;                        // N - Filename for the file that was uploaded
    public string $contentReqId = "1483999952979";  // N - Content reqId
    public string $name = "Multi Sheet";            // N - Name
    public string $purpose = "MAIN_CONTENT";        // N - Purpose
    public bool $printReady = true;                 // N - Print ready
    public array $pageGroups = [];                  // N - Page groups
}