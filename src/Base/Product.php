<?php

namespace EXACTSports\FedEx\Base;

use EXACTSports\FedEx\Base\Product\Choice;
use EXACTSports\FedEx\Base\Product\ContentAssociation;
use EXACTSports\FedEx\Base\Product\Feature;
use EXACTSports\FedEx\Base\Product\Property;

class Product
{
    public string $id;                  // N - Unique identifier for the respective product
    public string $name;                // N - Name of the respective product, ex poster, banner
    public int $version;                // N - Version of the respective product
    public string $instanceId;          // Y - Client-generated unique identifier for the product instance in the request. This ID will be used in the response to
                                        // map rates for respective products when applicable. This ID is also used to map product association with recipient(s)
    public string $userProductName;     // N - User provided product name
    public int $qty;                    // Y - Number of copies to be produced. Quantity given at product level must be equal to sum of quantities in product association for the same product
    public array $properties;           // N - Properties for the print job which have name-value pairs and a unique ID. Used in the case of uploaded documents
    public array $features;             // N - Finishing options for order (ex. paper size, print color, folding, etc.). Mandatory when using contentReference
    public array $pageExceptions;      // N - Pages that should have different features than the other pages in the print job
    public array $contentAssociations;  // N - Contains details of the uploaded document. Must be present when catalogReference is not used
    public array $catalogReference;     // N - Contains the catalogProductId and version of the document to be printed
}
