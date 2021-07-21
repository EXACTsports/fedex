<?php

namespace EXACTSports\FedEx\Http\Livewire;

use EXACTSports\FedEx\Base\Recipient;
use EXACTSports\FedEx\DeliveryOptions\Delivery;
use EXACTSports\FedEx\DeliveryOptions\DeliveryRequestedPickup;
use EXACTSports\FedEx\DeliveryOptions\ProductAssociation;
use EXACTSports\FedEx\DeliveryOptions\Request;
use EXACTSports\FedEx\DeliveryOptions\RequestedDeliveryTypes;
use EXACTSports\FedEx\FedExTrait;
use EXACTSports\FedEx\Http\Services\FedExService;
use EXACTSports\FedEx\Rates\RatesRequest; 
use Livewire\Component;

class Content extends Component
{
    use FedExTrait;

    public bool $showUploadFileComponent = true;
    public bool $showSetPrintOptionsComponent = false;
    public bool $showCart = false;
    public bool $showDeliveryOptions = false;
    public bool $showCheckout = false;
    public bool $showLoader = false;
    public bool $showSelectLocation = true;
    public bool $showContactInformation = false;
    public bool $showPaymentInformation = false;
    public array $documents = array();  // This array keeps all documents with its corresponding print options
    public array $document = [];
    protected $listeners = [
            'setParentDocuments', 
            'addDocument',
            'setPrintOptions', 
            'deleteDocument', 
            'showLoader',
            'searchLocations'
    ];
    public array $locations = [];

    /**
     * Shows loader.
     */
    public function showLoader(bool $value)
    {
        $this->showLoader = $value;
    }

    /**
     * Adds document
     */
    public function addDocument(array $document)
    {
        $this->document = $document;
        $this->documents[] = $this->document;
    }

    /**
     * Sets parent documents.
     */
    public function setParentDocuments(array $document)
    {
        $this->documents[] = $document;
    }

    /**
     * Deletes document.
     * @param int $index
     */
    public function deleteDocument(int $index)
    {
        unset($this->documents[$index]);
        $this->emit('updateDocuments', $this->documents);
    }

    /**
     * Sets print options.
     * @param int $index
     */
    public function setPrintOptions($index)
    {
        $this->document = $this->documents[(int) $index];
        $this->showUploadFileComponent = false;
        $this->showSetPrintOptionsComponent = true;
        $this->emit('updateDocument', $this->document);
    }

    /**
     * Goes to checkout page
     */
    public function goToCheckout()
    {    
        $this->showUploadFileComponent = false;
        $this->showCheckout = true;
    }

    /**
     * Searches locations.
     */
    public function searchLocations(string $distance, string $address)
    {
        $addressArr = array_map(function ($value) {
            return trim($value);
        }, explode(',', $address));

        $products = [];
        $productAssociations = [];

        foreach ($this->documents as $doc) {
            $products[] = $doc['product'];

            $productAssociation = new ProductAssociation();
            $productAssociation->id = $doc['product']['instanceId'];
            $productAssociation->quantity = $doc['product']['qty'];

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

        $this->locations = $response['output']['deliveryOptions'][0]['pickupOptions'];
    }

    /**
     * Goes to contact information
     */
    public function gotToContactInformation()
    {
        $this->showSelectLocation = false; 
        $this->showContactInformation = true; 
        $this->showPaymentInformation = false; 
    }

    public function render()
    {
        return view('fedex::livewire.content');
    }
}
