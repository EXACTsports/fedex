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
use EXACTSports\FedEx\Http\Services\CheckoutService;
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
            'fetchLocations',
            'showContactInformationForm',
            'goToPaymentInformation',
            'placeOrder'
    ];

    /* BEGING CHECKOUT */
    public array $locations = [];
    /* END CHECKOUT */
    
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
    public function fetchLocations(string $distance, string $address)
    {
        $checkoutService = new CheckoutService();
        $this->locations = $checkoutService->getLocations($this->documents, $distance, $address);
    }

    /**
     * Goes to contact information
     */
    public function showContactInformationForm(string $locationId)
    {
        // Get rate 
        $checkoutService = new CheckoutService();
        $rateDetails = $checkoutService->getDocumentsRate($this->documents, $locationId);

        $this->showSelectLocation = false; 
        $this->showContactInformation = true; 
        $this->showPaymentInformation = false; 
    }

    /**
     * Goes to payment information
     */
    public function goToPaymentInformation($contactInformation)
    {
        $this->contactInformation = $contactInformation;
        $this->showSelectLocation = false; 
        $this->showContactInformation = false; 
        $this->showPaymentInformation = true; 
    }

    /**
     * Places order
     * @param array $paymentInformation
     */
    public function placeOrder(array $paymentInformation)
    {
        $response = CheckoutService::submitOrder($this->documents, $this->contactInformation, $paymentInformation);
    }

    /**
     * Get back to select location
     */
    public function getBackToSelectLocation()
    {
        $this->showSelectLocation = true; 
        $this->showContactInformation = false; 
        $this->showPaymentInformation = false; 
    }

    public function render()
    {
        return view('fedex::livewire.content');
    }
}
