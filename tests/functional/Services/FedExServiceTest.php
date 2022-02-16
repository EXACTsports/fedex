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
use EXACTSports\FedEx\Services\UploadConversion\Rate;
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

        $options['1448981549109']['selected'] = "1448986650332"; // 8.5x11
        $options['1448981549741']['selected'] = "1448988664295"; // 32lb
        $options['1448981549581']['selected'] = "1448988600931"; // B&W
        $options['1448981549269']['selected'] = "1448988124807"; // Double Sided
        $options['1448984679218']['selected'] = "1449000016192"; // Portrait
        $options['1448981554101']['selected'] = "1448990257151"; // Prints Per Page

        $pageGroup = new PageGroup();
        $pageGroup->start = 1;
        $pageGroup->end = 5;
        $pageGroup->width = 8.5;
        $pageGroup->height = 11;

        $contentAssociation = new ContentAssociation();
        $contentAssociation->parentContentReference = '13023738835148663768800626030551265807845';
        $contentAssociation->contentReference = '13023843245048243454418873968780053634881';
        $contentAssociation->contentType = 'PDF';
        $contentAssociation->fileName = '21-08-01-Los-Angeles-Volleyball-1075-coach_packet.pdf';
        $contentAssociation->pageGroups[] = $pageGroup;

        $product = (new ProductService())->getBaseProduct();

        $product->instanceId = 16409035591;
        $product->userProductName = '21-08-01-Los-Angeles-Volleyball-1075-coach_packet.pdf';
        $product->qty = 17;
        $product->features = (new ProductFeatures())->getBaseFeatures($options);
        $product->contentAssociations[] = $contentAssociation;

        $productAssociation = new ProductAssociation();
        $productAssociation->id = 16409035591;
        $productAssociation->quantity = 17;

        $this->productAssociations[] = $productAssociation;
        $this->products[] = $product;
    }

    public function testGetDeliveryOptions(): void
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

        $this->assertStringContainsString('Libertyville IL West of I94', json_encode($response));
    }

    public function testGetRate(): void
    {
        $rate = new Rate();        

        $foldingIndex;
        $featureIndex;
        
        foreach ($this->products[0]->features as $index => &$feature) {
            if ($feature->id == "1448984877645") {
                $foldingIndex = $index;
            }

            if ($feature->id == "1448981549269") {
                if ($feature->choice->id == "1448988124807") {
                    foreach ($this->products[0]->features as $i => $f) {
                        if ($f->id == "1448981554597") {
                            $featureIndex = $i;
                        }
                    }
                }
            }
        }
       
        array_splice($this->products[0]->features, $foldingIndex, 1);
        array_splice($this->products[0]->features, $featureIndex, 1);
        

        $request = $rate->getRateRequest($this->products[0]);
        
        $response = (new FedExService())->getRate($request);

        $this->assertTrue(isset($response->output));
    }

    public function testOrderSubmission(): void
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

        $response = app(FedExService::class)->orderSubmissions($request);

        $this->assertTrue(isset($response->output));
    }
}
