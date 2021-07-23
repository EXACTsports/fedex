<?php

namespace EXACTSports\FedEx\Http\Services;

use EXACTSports\FedEx\Http\Services\FedExService;
use EXACTSports\FedEx\DeliveryOptions\Delivery;
use EXACTSports\FedEx\DeliveryOptions\DeliveryRequestedPickup;
use EXACTSports\FedEx\DeliveryOptions\ProductAssociation;
use EXACTSports\FedEx\DeliveryOptions\Request;
use EXACTSports\FedEx\DeliveryOptions\RequestedDeliveryTypes;
use EXACTSports\FedEx\Rates\RatesRequest;
use EXACTSports\FedEx\Base\Recipient;
use EXACTSports\FedEx\FedExTrait;

class CheckoutService
{
    use FedExTrait;

    /**
     * Gets locations
     */
    public function getLocations(array $documents, string $distance, string $address)
    {
         $addressArr = array_map(function ($value) {
            return trim($value);
        }, explode(',', $address));

        $products = [];
        $productAssociations = [];

        foreach ($documents as $document) {
            $products[] = $document['product'];

            $productAssociation = new ProductAssociation();
            $productAssociation->id = $document['product']['instanceId'];
            $productAssociation->quantity = $document['product']['qty'];

            $productAssociations[] = $productAssociation;
        }

        $delivery = new Delivery();
        $delivery->address->streetLines[] = $addressArr[0];
        $delivery->address->city = $addressArr[1];
        $delivery->address->stateOrProvinceCode = $addressArr[2];
        $delivery->address->postalCode = $addressArr[3];
        $delivery->address->countryCode = 'US';
        $delivery->address->addressClassification = 'HOME';

        $delivery->requestedDeliveryTypes->requestedPickup->resultsRequested = 10;
        $delivery->requestedDeliveryTypes->requestedPickup->searchRadius->value = explode('-', $distance)[0];
        $delivery->requestedDeliveryTypes->requestedPickup->searchRadius->unit = 'MILES';
        $delivery->productAssociations = $productAssociations;

        $doRequest = new Request('deliveryOptions');
        $doRequest->deliveryOptionsRequest->products = $products;
        $doRequest->deliveryOptionsRequest->deliveries = [$delivery];

        $response = (new FedexService())->getDeliveryOptions($this->removeEmptyElements(
         (array) $doRequest
        ));

        return $response['output']['deliveryOptions'][0]['pickupOptions'];
    }

    /**
     * Gets documents rate
     * @param array $documents
     * @param string $idLocation
     */
    public function getDocumentsRate(array $documents = [], string $idLocation = "")
    {
        $ratesRequest = new RatesRequest();
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
        $ratesRequest->rateRequest->products = $products;
        $ratesRequest->rateRequest->recipients[] = $recipient;
        $response = (new FedexService())->getRate($this->removeEmptyElements($this->objectToArray($ratesRequest)));

        return $response->output->rate->rateDetails;
    }

    /**
     * Encrypts data
     */
    public function getEncryptedData(string $cardData)
    {
        return (new FedexService())->getEncryptedData($cardData);
    }

    /**
     * Submits order
     */
    public function submitOrder()
    {
    }
}