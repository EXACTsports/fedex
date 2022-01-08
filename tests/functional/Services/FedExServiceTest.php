<?php

namespace Tests\functional\Services;

use EXACTSports\FedEx\Base\Contact;
use EXACTSports\FedEx\Base\PageGroup;
use EXACTSports\FedEx\Base\PhoneNumberDetail;
use EXACTSports\FedEx\Base\Product\ContentAssociation;
use EXACTSports\FedEx\Base\Product\ProductFeatures;
use EXACTSports\FedEx\Base\Recipient;
use EXACTSports\FedEx\DeliveryOptions\Delivery;
use EXACTSports\FedEx\DeliveryOptions\ProductAssociation;
use EXACTSports\FedEx\DeliveryOptions\Request;
use EXACTSports\FedEx\FedExTrait;
use EXACTSports\FedEx\OrderSubmissions\Payment;
use EXACTSports\FedEx\OrderSubmissions\Request as OSRequest;
use EXACTSports\FedEx\Services\FedExService;
use EXACTSports\FedEx\Services\ProductService;
use Tests\TestCase;

class FedExServiceTest extends TestCase
{
    use FedExTrait;

    private FedExService $fedExService;

    private array $productAssociations;

    private array $products;

    public function setUp() : void
    {
        parent::setUp();

        $options['1448981549109']['selected'] = '1448986650332'; // 8.5x11
        $options['1448981549741']['selected'] = '1448988661630'; // 24lb
        $options['1448981549581']['selected'] = '1448988600931'; // B&W
        $options['1448981549269']['selected'] = '1448988124560'; // Single
        $options['1448984679218']['selected'] = '1449000016192'; // Portrait
        $options['1448981554101']['selected'] = '1448990257151'; // Prints Per Page

        $pageGroup = new PageGroup();
        $pageGroup->start = 1;
        $pageGroup->end = 2;
        $pageGroup->width = 8.5;
        $pageGroup->height = 11;

        $contentAssociation = new ContentAssociation();
        $contentAssociation->parentContentReference = '12908100113209068636807434278081056720995';
        $contentAssociation->contentReference = '12908065522168811287015008554850000984596';
        $contentAssociation->contentType = 'PDF';
        $contentAssociation->fileName = '21-08-01-Los-Angeles-Volleyball-1075-checkin.pdf';
        $contentAssociation->pageGroups[] = $pageGroup;

        $product = (new ProductService())->getBaseProduct();

        $product->instanceId = 1640903559;
        $product->userProductName = '21-08-01-Los-Angeles-Volleyball-1075-checkin.pdf';
        $product->qty = 3;
        $product->features = (new ProductFeatures())->getBaseFeatures($options);
        $product->contentAssociations[] = $contentAssociation;

        $productAssociation = new ProductAssociation();
        $productAssociation->id = 1640903559;
        $productAssociation->quantity = 3;

        $this->productAssociations[] = $productAssociation;
        $this->products[] = $product;
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetProductsRate()
    {
        $fedexService = new FedExService();
        $request = [
            'rateRequest' => [
                'products' => [
                    [
                        'id' => '1456773326927',
                        'name' => 'Multi Sheet',
                        'version' => 2,
                        'instanceId' => '1636671062',
                        'userProductName' => '21-08-01-Los-Angeles-Volleyball-1075-coach_packet.pdf',
                        'qty' => 17,
                        'properties' => [
                            [
                                'id' => '1453242488328',
                                'name' => 'ZOOM_PERCENTAGE',
                                'value' => '60',
                            ],
                            [
                                'id' => '1453895478444',
                                'name' => 'MIN_DPI',
                                'value' => '150',
                            ],
                            [
                                'id' => '1453894861756',
                                'name' => 'LOCK_CONTENT_ORIENTATION',
                                'value' => false,
                            ],
                            [
                                'id' => '1453243262198',
                                'name' => 'ENCODE_QUALITY',
                                'value' => '100',
                            ],
                            [
                                'id' => '1454950109636',
                                'name' => 'USER_SPECIAL_INSTRUCTIONS',
                                'value' => null,
                            ],
                            [
                                'id' => '1455050109636',
                                'name' => 'DEFAULT_IMAGE_WIDTH',
                                'value' => '8.5',
                            ],
                            [
                                'id' => '1455050109631',
                                'name' => 'DEFAULT_IMAGE_HEIGHT',
                                'value' => '11',
                            ],
                            [
                                'id' => '1494365340946',
                                'name' => 'PREVIEW_TYPE',
                                'value' => 'DYNAMIC',
                            ],
                            [
                                'id' => '1470151626854',
                                'name' => 'SYSTEM_SI',
                                'value' => null,
                            ],
                            [
                                'id' => '1470151737965',
                                'name' => 'TEMPLATE_AVAILABLE',
                                'value' => 'NO',
                            ],
                            [
                                'id' => '1490292304798',
                                'name' => 'MIGRATED_PRODUCT',
                                'value' => 'true',
                            ],
                        ],
                        'features' => [
                            [
                                'id' => '1448981549109',
                                'name' => 'Paper Size',
                                'choice' => [
                                    'id' => '1448986650332',
                                    'name' => '8.5x11',
                                    'properties' => [
                                        [
                                            'id' => '1449069906033',
                                            'name' => 'MEDIA_HEIGHT',
                                            'value' => '11',
                                        ],
                                        [
                                            'id' => '1449069908929',
                                            'name' => 'MEDIA_WIDTH',
                                            'value' => '8.5',
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'id' => '1448981549741',
                                'name' => 'Paper Type',
                                'choice' => [
                                    'id' => '1448988664295',
                                    'name' => 'Laser (32 lb.)',
                                    'properties' => [
                                        [
                                            'id' => '1450324098012',
                                            'name' => 'MEDIA_TYPE',
                                            'value' => 'E32',
                                        ],
                                        [
                                            'id' => '1453234015081',
                                            'name' => 'PAPER_COLOR',
                                            'value' => '#FFFFFF',
                                        ],
                                        [
                                            'id' => '1471275182312',
                                            'name' => 'MEDIA_CATEGORY',
                                            'value' => 'RESUME',
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'id' => '1448981549581',
                                'name' => 'Print Color',
                                'choice' => [
                                    'id' => '1448988600611',
                                    'name' => 'Full Color',
                                    'properties' => [
                                        [
                                            'id' => '1453242778807',
                                            'name' => 'PRINT_COLOR',
                                            'value' => 'COLOR',
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'id' => '1448981549269',
                                'name' => 'Sides',
                                'choice' => [
                                    'id' => '1448988124560',
                                    'name' => 'Single-Sided',
                                    'properties' => [
                                        [
                                            'id' => '1461774376168',
                                            'name' => 'SIDE',
                                            'value' => 'SINGLE',
                                        ],
                                        [
                                            'id' => '1471294217799',
                                            'name' => 'SIDE_VALUE',
                                            'value' => '1',
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'id' => '1448984679218',
                                'name' => 'Orientation',
                                'choice' => [
                                    'id' => '1449000016192',
                                    'name' => 'Vertical',
                                    'properties' => [
                                        [
                                            'id' => '1453260266287',
                                            'name' => 'PAGE_ORIENTATION',
                                            'value' => 'PORTRAIT',
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'id' => '1448981554101',
                                'name' => 'Prints Per Page',
                                'choice' => [
                                    'id' => '1448990257151',
                                    'name' => 'One',
                                    'properties' => [
                                        [
                                            'id' => '1455387404922',
                                            'name' => 'PRINTS_PER_PAGE',
                                            'value' => 'ONE',
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'id' => '1448984877869',
                                'name' => 'Cutting',
                                'choice' => [
                                    'id' => '1448999392195',
                                    'name' => 'None',
                                    'properties' => [],
                                ],
                            ],
                            [
                                'id' => '1448981555573',
                                'name' => 'Hole Punching',
                                'choice' => [
                                    'id' => '1448999902070',
                                    'name' => 'None',
                                    'properties' => [],
                                ],
                            ],
                            [
                                'id' => '1448981532145',
                                'name' => 'Collation',
                                'choice' => [
                                    'id' => '1448986654687',
                                    'name' => 'Collated',
                                    'properties' => [
                                        [
                                            'id' => '1449069945785',
                                            'name' => 'COLLATION_TYPE',
                                            'value' => 'MACHINE',
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'id' => '1448984679442',
                                'name' => 'Lamination',
                                'choice' => [
                                    'id' => '1448999458409',
                                    'name' => 'None',
                                    'properties' => [],
                                ],
                            ],
                        ],
                        'contentAssociations' => [
                            [
                                'parentContentReference' => '12742959633065283519616696809770541953321',
                                'contentReference' => '12742954914040976625419627059360196884682',
                                'contentType' => 'PDF',
                                'fileName' => '21-08-01-Los-Angeles-Volleyball-1075-coach_packet.pdf',
                                'contentReqId' => '1483999952979',
                                'name' => 'Multi Sheet',
                                'purpose' => 'MAIN_CONTENT',
                                'printReady' => true,
                                'pageGroups' => [
                                    [
                                        'start' => 1,
                                        'end' => 5,
                                        'width' => 8.5,
                                        'height' => 11,
                                        'orientation' => 'PORTRAIT',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $response = $fedexService->getRate($request);

        $this->assertTrue(true);
    }

    public function testGetDeliveryOptions()
    {
        $delivery = new Delivery();
        $delivery->address->streetLines = ['17976 West Big Oaks Road'];
        $delivery->address->city = 'Grayslake';
        $delivery->address->stateOrProvinceCode = 'IL';
        $delivery->address->postalCode = '60030';
        $delivery->address->countryCode = 'US';
        $delivery->address->addressClassification = 'HOME';

        $delivery->requestedDeliveryTypes->requestedPickup->resultsRequested = 10;
        $delivery->requestedDeliveryTypes->requestedPickup->searchRadius->value = 25;
        $delivery->requestedDeliveryTypes->requestedPickup->searchRadius->unit = 'MILES';
        $delivery->productAssociations = $this->productAssociations;

        $request = new Request();
        $request->deliveryOptionsRequest->products = $this->products;
        $request->deliveryOptionsRequest->deliveries = [$delivery];

        $response = (new FedexService())->getDeliveryOptions((array) $request);
    }

    public function testOrderSubmission()
    {
        $request = new OSRequest();
        $contact = new Contact();
        $recipient = new Recipient();

        $contact->company->name = 'exactsports';
        $contact->emailDetail->emailAddress = 'md020985@gmail.com';
        $contact->personName->firstName = 'Julian';
        $contact->personName->lastName = 'May';

        $phoneNumberDetail = new PhoneNumberDetail();
        $phoneNumberDetail->phoneNumber->number = '2145507534';
        $phoneNumberDetail->phoneNumber->extension = '123';
        $phoneNumberDetail->usage = 'PRIMARY';

        $contact->phoneNumberDetails[] = $phoneNumberDetail;

        $request->orderSubmissionRequest->orderContact->contact = $contact;
        $request->orderSubmissionRequest->products = $this->products;

        $recipient->contact = $contact;
        $recipient->pickUpDelivery->location->id = '0277';
        $recipient->productAssociations = $this->productAssociations;

        $request->orderSubmissionRequest->recipients[] = $recipient;

        $payment = new Payment();

        $payment->creditCard->billingAddress->city = 'Chicago';
        $payment->creditCard->billingAddress->countryCode = 'US';
        $payment->creditCard->billingAddress->postalCode = '60603';
        $payment->creditCard->billingAddress->stateOrProvinceCode = 'IL';
        $payment->creditCard->billingAddress->streetLines[] = '140 S Dearborn #310';

        $payment->creditCard->cardHolderName = 'JULIAN MAY';
        $payment->creditCard->encryptedCreditCard = 'iD0Nmdbi8rRNVMDBPAztWtcGLcoDCD5s8QDVtwiUyGXAxKdPsvI8484snTlYTBMMiv7emPwZFVdIIykyxrWWSSb2/v24+AgcXn+l5L/w6/T50UcFgtjUMGjIuV4GGuATV4xUOzKH/dOPyYJ+9g6JudocYjjkHBI/AL8Vf4zEXjnE6ZLzKn9rpbF+2Ws6ha5eS7umXZJ313iBY37EtMY+fOXc7/2Z9jwbSxReWid7mdeIhYmSdgTuZKUrWdp8FB/Kpcw+EmuWgNIpQHd0+iXGPBRRn6mpkiklpDD9wY4K4JLUsDV4Vh9z+yJwltv8QSCSlUuKCnaWcmjo41a/kW45ig==';
        $payment->creditCard->expirationMonth = '02';
        $payment->creditCard->expirationYear = '2022';
        $payment->creditCard->type = 'VISA';

        $request->orderSubmissionRequest->payments[] = $payment;

        $request = $this->removeEmptyElements($this->objectToArray($request));

        $response = (new FedexService())->orderSubmisions((array) $request);

        $this->assertTrue(isset($response->output));
    }
}
