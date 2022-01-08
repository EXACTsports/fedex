<?php

namespace EXACTSports\FedEx\Services\PickupRequest;

use EXACTSports\FedEx\DeliveryOptions\Delivery;
use EXACTSports\FedEx\DeliveryOptions\ProductAssociation;
use EXACTSports\FedEx\DeliveryOptions\Request;
use EXACTSports\FedEx\FedExTrait;
use EXACTSports\FedEx\Services\FedExService;

class Location
{
    use FedExTrait;

    /**
     * Gets locations.
     * @param array $documents
     * @param string $distance
     * @param string $address
     */
    public function search(array $documents, string $distance, array $address)
    {
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

        $response = (new FedexService())->getDeliveryOptions((array) $doRequest);

        return $response->output->deliveryOptions[0]->pickupOptions;
    }

    /**
     * Gets location details. This method makes a call to api v1.
     * @param int $id
     * @param string $startDate
     */
    public function getDetails(int $id, string $startDate = '')
    {
        $response = (new FedexService())->getLocationDetails($id, $startDate);

        return ! empty($response->output->location) ? $response->output->location : null;
    }
}
