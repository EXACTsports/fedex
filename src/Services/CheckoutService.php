<?php

namespace EXACTSports\FedEx\Services;

use EXACTSports\FedEx\Base\Recipient;
use EXACTSports\FedEx\Rates\RatesRequest;
use EXACTSports\FedEx\Services\OrderRequest\OrderSubmission;
use EXACTSports\FedEx\Services\PickupRequest\Location;

class CheckoutService
{
    public Location $location;

    public function __construct()
    {
        $this->location = new Location();
    }

    /**
     * Gets locations.
     * @param array $documents
     * @param string $distance
     * @param string $address
     */
    public function getLocations(array $documents, string $distance, string $address)
    {
        $locations = $this->location->search($documents, $distance, $address);
    }

    /**
     * Gets documents rate.
     * @param array $documents
     * @param string $idLocation
     */
    public function getDocumentsRate(array $documents = [], string $idLocation = '')
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
     * Encrypts data.
     */
    public function getEncryptedData(string $cardData)
    {
        return (new FedexService())->getEncryptedData($cardData);
    }

    /**
     * Submits order.
     * @param array $documents
     * @param array $contactInformation
     * @param array $paymentInformation
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
        
        return (new FedExService)->orderSubmissions($request);
    }
}
