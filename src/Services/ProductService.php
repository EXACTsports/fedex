<?php

namespace EXACTSports\FedEx\Services;

use EXACTSports\FedEx\Base\Product;
use EXACTSports\FedEx\Base\PageGroup;
use EXACTSports\FedEx\Base\Product\Choice;
use EXACTSports\FedEx\Base\Product\Feature;
use EXACTSports\FedEx\Base\Product\Property;
use EXACTSports\FedEx\Base\Product\ContentAssociation;

class ProductService
{
    private Product $product;
    private ContentAssociation $contentAssociation;
    public array $printOptionIds = [
        "1448981549109", 
        "1448981549741",
        "1448981549581",
        "1448981549269",
        "1448984679218",
        "1448981554101",
        "1448984877869",
        "1448981555573",
        "1448981532145",
        "1448984679442"
    ];

    public function __construct()
    {
        $this->product = new Product();
        $this->contentAssociation = new ContentAssociation();
        $this->setBaseProduct();
    }

    /**
     * Sets base product.
     */
    public function setBaseProduct()
    {
        $this->product->id = '1456773326927'; // This is the base id, it is used for custom document
        $this->product->name = 'Multi Sheet';
        $this->product->version = 2;
        $this->product->instanceId = time();
        $this->product->userProductName = '';
        $this->product->qty = 1;
        $this->product->properties = $this->getBaseProperties();
        $this->product->features = $this->getBaseFeatures();
        $this->product->pageExceptions = [];
        $this->product->contentAssociations = [];
    }

    /**
     * Gets base features.
     */
    public function getBaseFeatures()
    {
        $features = [];

        // Paper size
        $properties = [];
        $properties[] = new Property('1449069906033', 'MEDIA_HEIGHT', '11');
        $properties[] = new Property('1449069908929', 'MEDIA_WIDTH', '8.5');
        $choice = new Choice('1448986650332', '8.5x11', $properties);
        $features[] = new Feature('1448981549109', 'Paper Size', $choice);

        // Paper type
        $properties = [];
        $properties[] = new Property('1450324098012', 'MEDIA_TYPE', 'E32');
        $properties[] = new Property('1453234015081', 'PAPER_COLOR', '#FFFFFF');
        $properties[] = new Property('1471275182312', 'MEDIA_CATEGORY', 'RESUME');
        $choice = new Choice('1448988664295', 'Laser (32 lb.)', $properties);
        $features[] = new Feature('1448981549741', 'Paper Type', $choice);

        // Print color
        $properties = [];
        $properties[] = new Property('1453242778807', 'PRINT_COLOR', 'COLOR');
        $choice = new Choice('1448988600611', 'Full Color', $properties);
        $features[] = new Feature('1448981549581', 'Print Color', $choice);

        // Sides
        $properties = [];
        $properties[] = new Property('1461774376168', 'SIDE', 'SINGLE');
        $properties[] = new Property('1471294217799', 'SIDE_VALUE', '1');
        $choice = new Choice('1448988124560', 'Single-Sided', $properties);
        $features[] = new Feature('1448981549269', 'Sides', $choice);

        // Orientation
        $properties = [];
        $properties[] = new Property('1453260266287', 'PAGE_ORIENTATION', 'PORTRAIT');
        $choice = new Choice('1449000016192', 'Vertical', $properties);
        $features[] = new Feature('1448984679218', 'Orientation', $choice);

        // Prints per page
        $properties = [];
        $properties[] = new Property('1455387404922', 'PRINTS_PER_PAGE', 'ONE');
        $choice = new Choice('1448990257151', 'One', $properties);
        $features[] = new Feature('1448981554101', 'Prints Per Page', $choice);

        // Cutting
        $properties = [];
        $choice = new Choice('1448999392195', 'None', []);
        $features[] = new Feature('1448984877869', 'Cutting', $choice);

        // Hole punching
        $properties = [];
        $choice = new Choice('1448999902070', 'None', []);
        $features[] = new Feature('1448981555573', 'Hole Punching', $choice);

        // Collation
        $properties = [];
        $properties[] = new Property('1449069945785', 'COLLATION_TYPE', 'MACHINE');
        $choice = new Choice('1448986654687', 'Collated', $properties);
        $features[] = new Feature('1448981532145', 'Collation', $choice);

        // Lamination
        $properties = [];
        $choice = new Choice('1448999458409', 'None', []);
        $features[] = new Feature('1448984679442', 'Lamination', $choice);

        return $features;
    }

    /**
     * Gets base properties.
     */
    public function getBaseProperties() : array
    {
        $properties = [];
        $properties[] = new Property('1453242488328', 'ZOOM_PERCENTAGE', '60');
        $properties[] = new Property('1453895478444', 'MIN_DPI', '150');
        $properties[] = new Property('1453894861756', 'LOCK_CONTENT_ORIENTATION', false);
        $properties[] = new Property('1453243262198', 'ENCODE_QUALITY', '100');
        $properties[] = new Property('1454950109636', 'USER_SPECIAL_INSTRUCTIONS', null);
        $properties[] = new Property('1455050109636', 'DEFAULT_IMAGE_WIDTH', '8.5');
        $properties[] = new Property('1455050109631', 'DEFAULT_IMAGE_HEIGHT', '11');
        $properties[] = new Property('1494365340946', 'PREVIEW_TYPE', 'DYNAMIC');
        $properties[] = new Property('1470151626854', 'SYSTEM_SI', null);
        $properties[] = new Property('1470151737965', 'TEMPLATE_AVAILABLE', 'NO');
        $properties[] = new Property('1490292304798', 'MIGRATED_PRODUCT', 'true');

        return $properties;
    }

    /**
     * Gets base product.
     */
    public function getBaseProduct() : Product
    {
        return $this->product;
    }

    /**
     * Gets content association
     * @param object $document in question
     */
    public function getContentAssociation(object $document) : ContentAssociation 
    {
        $pageGroup = new PageGroup();
        $pageGroup->start = $document->metrics->pageGroups[0]->startPageNum;
        $pageGroup->end = $document->metrics->pageGroups[0]->endPageNum;
        $pageGroup->width = $document->metrics->pageGroups[0]->pageWidthInches;
        $pageGroup->height = $document->metrics->pageGroups[0]->pageHeightInches;

        $contentAssociation = new ContentAssociation();
        $contentAssociation->parentContentReference = $document->parentDocumentId;
        $contentAssociation->contentReference = $document->documentId;
        $contentAssociation->contentType = $document->documentType;
        $contentAssociation->fileName = $document->originalDocumentName;
        $contentAssociation->pageGroups[] = $pageGroup;

        return $contentAssociation;
    }
}
