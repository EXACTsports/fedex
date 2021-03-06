<?php

namespace EXACTSports\FedEx\Services\PickupRequest;

use EXACTSports\FedEx\DeliveryOptions\Delivery;
use EXACTSports\FedEx\DeliveryOptions\ProductAssociation;
use EXACTSports\FedEx\DeliveryOptions\Request;
use EXACTSports\FedEx\FedExTrait;
use EXACTSports\FedEx\Services\FedExService;
use GuzzleHttp\Exception\GuzzleException;

class Location
{
    use FedExTrait;

    /**
     * @throws GuzzleException
     */
    public function search(array $documents, string $distance, array $address)
    {
        $products = [];
        $productAssociations = [];

        foreach ($documents as $document) {


            $products[] = $document['product'];

            $productAssociation = new ProductAssociation();
            $productAssociation->id = data_get($document, 'product.instanceId');
            $productAssociation->quantity = data_get($document, 'product.qty');

            $productAssociations[] = $productAssociation;
        }

        $delivery = new Delivery();
        $delivery->address->streetLines = data_get($address, 'street');
        $delivery->address->city = data_get($address, 'city');
        $delivery->address->stateOrProvinceCode = data_get($address, 'state');
        $delivery->address->postalCode = data_get($address, 'zip');
        $delivery->address->countryCode = data_get($address, 'country');
        $delivery->address->addressClassification = data_get($address, 'type');
        $delivery->requestedDeliveryTypes->requestedPickup->resultsRequested = 10;
        $delivery->requestedDeliveryTypes->requestedPickup->searchRadius->value = explode('-', $distance)[0];
        $delivery->requestedDeliveryTypes->requestedPickup->searchRadius->unit = 'MILES';
        $delivery->productAssociations = $productAssociations;

        $doRequest = new Request();
        $doRequest->deliveryOptionsRequest->products = $products;
        $doRequest->deliveryOptionsRequest->deliveries = [$delivery];

        $response = (new FedExService())->getDeliveryOptions((array) $doRequest);

        return $response;
    }

    /**
     * @throws GuzzleException
     */
    public function getDetails(string $id)
    {
        $response = (new FedExService())->getLocationDetails($id);
        
        
        return ! empty($response->output->location) ? $response->output->location : null;
    }
}
