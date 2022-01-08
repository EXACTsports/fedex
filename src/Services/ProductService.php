<?php

namespace EXACTSports\FedEx\Services;

use EXACTSports\FedEx\Base\PageGroup;
use EXACTSports\FedEx\Base\Product;
use EXACTSports\FedEx\Base\Product\ContentAssociation;
use EXACTSports\FedEx\Base\Product\ProductFeatures;
use EXACTSports\FedEx\Base\Product\Property;
use JetBrains\PhpStorm\Pure;

class ProductService
{
    private Product $product;

    private ProductFeatures $productFeatures;

    public array $printOptionIds = [
        '1448981549109',
        '1448981549741',
        '1448981549581',
        '1448981549269',
        '1448984679218',
        '1448981554101',
        '1448984877869',
        '1448981555573',
        '1448981532145',
        '1448984679442',
    ];


    public function __construct()
    {

        $this->product = new Product();
        $this->productFeatures = new ProductFeatures();
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
        $this->product->features = $this->productFeatures->getBaseFeatures();
        $this->product->pageExceptions = [];
        $this->product->contentAssociations = [];
    }

    #[Pure]
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


    #[Pure]
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
