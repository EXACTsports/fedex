<?php 

namespace EXACTSports\FedEx\Base\Product;

class ContentAssociation
{
    public string $parentContentReference;          // N - Unique ID assigned to the original file that was uploaded
    public string $contentReference;                // N - Unique ID assigned to the converted file that was uploaded
    public string $contentType;                     // N - Type of file that was uploaded (ex. WORD)
    public string $fileName;                        // N - Filename for the file that was uploaded
    public string $catalogProductId;                // Y - Unique ID assigned to every catalog
    public string $version;                         // Y - Version of the catalog product the API user wants to use for the print order
}