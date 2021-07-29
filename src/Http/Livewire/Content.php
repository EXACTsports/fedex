<?php

namespace EXACTSports\FedEx\Http\Livewire;

use EXACTSports\FedEx\Http\Services\UploadFileService;
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

    private UploadFileService $uploadFileService;
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
    public int $documentIndex = 0;
    public array $currentDocument = [];
    public array $tempCurrentDocument = []; // This is used for keep all new set print options before apply them to the original
    public array $productFeatures = [];
    protected $listeners = [
            'addDocument',
            'deleteDocument', 
            'showLoader',
            'fetchLocations',
            'showContactInformationForm',
            'goToPaymentInformation',
            'placeOrder',
            'updatePrintOption'
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
        $this->currentDocument = $document;
        $this->documents[] = $document;
    }

    /**
     * Deletes document.
     * @param int $index
     */
    public function deleteDocument(int $index)
    {
        unset($this->documents[$index]);
    }

    /**
     * Sets print options.
     * @param int $index
     */
    public function setPrintOptions(int $index)
    {
        $this->currentDocument = $this->documents[(int) $index];
        $this->showUploadFileComponent = false;
        $this->showSetPrintOptionsComponent = true;
    }

    /**
     * Cancels set print options action
     */
    public function cancelSetPrintOptions()
    {
        $this->showUploadFileComponent = true;
        $this->showSetPrintOptionsComponent = false;
    }

    /**
     * Updates print option
     */
    public function updatePrintOption(string $index, string $printOptionId, string $selectedOptionId, int $documentIndex)
    {
        $uploadFileService = new UploadFileService();

        if (empty($this->tempCurrentDocument)) {
            $this->tempCurrenDocument = $this->currenDocument;
        }
        
        $updatedCurrentDocument = $uploadFileService->updatePrintOption($this->tempCurrenDocument, $printOptionId, $selectedOptionId);
        $this->tempCurrentDocument = $updatedCurrentDocument;
    }

    /**
     * Sets new print options
     */
    public function setNewPrintOptions($index)
    {
        $this->documents[$index] = $this->tempCurrenDocument;
        $this->tempCurrenDocument = [];
        $this->showUploadFileComponent = true;
        $this->showSetPrintOptionsComponent = false;
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
