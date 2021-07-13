<?php 

namespace EXACTSports\FedEx\Http\Livewire;

use Livewire\Component; 

class Content extends Component 
{
    public bool $showUploadFileComponent = true;
    public bool $showSetPrintOptionsComponent = false;
    public bool $showCart = false;
    public bool $showDeliveryOptions = false;
    public bool $showCheckout = false;
    public bool $showLoader = false;
    public array $documents = [];  // This array keeps all documents with its corresponding print options
    protected $listeners = ['setDocuments', 'setPrintOptions', 'deleteDocument', 'showCheckout', 'showLoader'];
    
    /**
     * Shows loader
     */
    public function showLoader(bool $value)
    {
        $this->showLoader = $value;
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

    public function showCheckout()
    {
        $this->showUploadFileComponent = false;
        $this->showCheckout = true;
    }

    public function render()
    {
        return view("fedex::livewire.content");
    }
}
