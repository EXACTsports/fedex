<?php

namespace EXACTSports\FedEx\Services\PickupRequest;

use EXACTSports\FedEx\Services\FedExService;
use EXACTSports\FedEx\FedExTrait;
use EXACTSports\FedEx\DeliveryOptions\ProductAssociation;
use EXACTSports\FedEx\DeliveryOptions\Request;
use EXACTSports\FedEx\DeliveryOptions\Delivery;
use EXACTSports\FedEx\DeliveryOptions\DeliveryRequestedPickup;
use EXACTSports\FedEx\DeliveryOptions\RequestedDeliveryTypes;

class Location 
{
    use FedExTrait;

    /**
     * Gets locations
     * @param array $documents
     * @param string $distance
     * @param string $address
     */
    public function search(array $documents, string $distance, string $address)
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

      return $response->output->deliveryOptions[0]->pickupOptions;
    }
}