<?php 

namespace EXACTSports\FedEx\Http\Livewire;

use Livewire\Component; 
use EXACTSports\FedEx\Rates\RateRequest;
use EXACTSports\FedEx\Base\Product;
use EXACTSports\FedEx\Http\Services\FedExService;
use EXACTSports\FedEx\Http\Services\ProductService;

class Content extends Component 
{
    public bool $showUploadFileComponent = true;
    public bool $showSetPrintOptionsComponent = false;
    public bool $showCart = false;
    public bool $showDeliveryOptions = false;
    public bool $showCheckout = false;
    public bool $showLoader = false;
    public array $documents = [];
    public array $document = []; 
    public array $cart = [];
    protected $listeners = ['setDocuments', 
        'setPrintOptions', 'deleteDocument', 'addTo' , 'goToCheckout', 'getLocations', 'placeOrder', 'showLoader', 'getFedExInstance'];
    private RateRequest $rateRequest;
    private FedExService $fedExService;
    private ProductService $productService;
    private Product $product; 

    public function mount()
    {
        $this->fedExService = new FedExService();
        $this->productService =new ProductService();
        $this->rateRequest = new RateRequest();
        $this->product = $this->productService->getBaseProduct();
    }

    /**
     * Gets fedEx instance
     */
    public function getFedExInstance()
    {
        return $this->fedExService;
    }

    /**
     * Shows loader
     */
    public function showLoader(bool $value)
    {
        $this->showLoader = $value;
    }

    /**
     * Sets array documents
     */
    public function setDocuments(array $document) 
    {
        $this->documents[] = $document;
        $this->emit('updateDocuments', $this->documents);
    }

    /**
     * Deletes document
     * @param int $index
     */
    public function deleteDocument(int $index)
    {
        unset($this->documents[$index]);
        $this->emit("updateDocuments", $this->documents);
    }
    
    /**
     * Sets print options
     * @param int $index
     */
    public function setPrintOptions($index)
    {
        $this->document = $this->documents[(int) $index]; 
        $this->emit('updateDocument', $this->document);
        $this->showUploadFileComponent = false;
        $this->showLoader(true);
        $this->showSetPrintOptionsComponent = true;
    }

    public function addTo()
    {
        $this->showSetPrintOptionsComponent = false;
        $this->showCart = true;
        $this->emit("cart", $this->documents);   
    }

    public function goToCheckout()
    {
        $this->showCart = false;
        $this->showCheckout = true;
        $this->emit("checkout", $this->documents);   
    }

    private function getContentAssociations()
    {
        $contentAssociations = [];

        foreach($this->documents as $document) {
            $contentAssociations[] = [
                "parentContentReference" => $document["parentDocumentId"], 
                "contentReference" => $document["documentId"], 
                "contentType" => "PDF", 
                "fileName" => $document["fileName"], 
                "contentReqId" => "1455709847200", 
                "name" => "Test", 
                "desc" => null, 
                "purpose" => "SINGLE_SHEET_FRONT", 
                "printReady" => true, 
                "pageGroups" => [
                    [
                        "start" => 1, 
                        "end" => 1, 
                        "width" => 8.5, 
                        "height" => 11, 
                        "orientation" => "PORTRAIT" 
                    ] 
                ] 
            ];
        }

        return $contentAssociations;
    }

    public function getLocations(string $distance = "", string $address = "")
    {
        $contentAssociations = $this->getContentAssociations();
        $this->emit("searchLocations", $contentAssociations);
    }

    /**
     * Places order
     */
    public function placeOrder()
    {
        $contentAssociations = $this->getContentAssociations();
        $this->emit("orderSubmission", $contentAssociations);
    }

    public function render()
    {
        return view("fedex::livewire.content");
    }
}
