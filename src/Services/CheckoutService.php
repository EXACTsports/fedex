<?php

namespace EXACTSports\FedEx\Services;

use EXACTSports\FedEx\Base\ProductAssociation;
use EXACTSports\FedEx\Base\Recipient;
use EXACTSports\FedEx\FedExTrait;
use EXACTSports\FedEx\Rates\RateRequest;
use EXACTSports\FedEx\Services\OrderRequest\OrderSubmission;
use EXACTSports\FedEx\Services\PickupRequest\Location;
use GuzzleHttp\Exception\GuzzleException;
use JetBrains\PhpStorm\Pure;

class CheckoutService
{
    use FedExTrait;

    public Location $location;

    #[Pure]
    public function __construct()
    {
        $this->location = new Location();
    }

    /**
     * @throws GuzzleException
     */
    public function getLocations(array $documents, string $distance, array $address): void
    {
        $locations = $this->location->search($documents, $distance, $address);
    }

    /**
     * @throws GuzzleException
     */
    public function getDocumentsRate(array $documents = [], string $idLocation = '')
    {
        $ratesRequest = new RateRequest();
        $products = [];
        $productAssociations = [];

        foreach ($documents as $document) {
            $products[] = $document['product'];

            $productAssociation = new ProductAssociation();
            $productAssociation->id = $document['product']['instanceId'];
            $productAssociation->quantity = $document['product']['qty'];

            $productAssociations[] = $productAssociation;
        }

        $recipient = new Recipient();
        $recipient->pickUpDelivery->location->id = $idLocation;
        $recipient->productAssociations = $productAssociations;
        $recipient = $this->removeEmptyElements($this->objectToArray($recipient));
        $ratesRequest->products = $products;
        $ratesRequest->recipients[] = $recipient;
        $response = (new FedexService())->getRate($this->removeEmptyElements($this->objectToArray($ratesRequest)));

        return $response->output->rate->rateDetails;
    }

    /**
     * @throws GuzzleException
     */
    public function getEncryptedData(string $cardData): string
    {
        return app(FedExService::class)->getEncryptedData($cardData);
    }

    /**
     * @throws GuzzleException
     */
    public function submitOrder(array $documents, array $contactInformation,
                                array $billingInformation,
                                array $paymentInformation,
                                string $locationId)
    {
        $cardData = 'M' .
            trim($paymentInformation['cardNumber']) . '=' . substr($paymentInformation['year'], -2) .
            $paymentInformation['month'] . ':' . $paymentInformation['securityCode'];
        
        $encryptedData = $this->getEncryptedData($cardData);
    
        $paymentInformation['encryptedData'] = $encryptedData;

        $orderSubmission = new OrderSubmission();

        $request = $orderSubmission->getRequest($documents, $contactInformation, $billingInformation, $paymentInformation, $locationId);
        // dd(json_encode($request));
        return (new FedExService())->orderSubmissions($request);
    }
}
