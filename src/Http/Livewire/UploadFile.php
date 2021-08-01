<?php

namespace EXACTSports\FedEx\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use EXACTSports\FedEx\Http\Services\UploadConversion\UploadConversionService;

class UploadFile extends Component
{
    use WithFileUploads;

    public $file = null;

    /**
     * Sets documents.
     */
    public function setDocument(array $document)
    {
        $this->emit('showLoader', false);
        $this->emit("addDocument", $document);
    }

    /**
     * Adds document
     */
    public function addDocument(array $document)
    {
        $this->emit("addDocument", $document);
    }

    public function goToCheckout()
    {
        $this->emit('showCheckout');
    }

    public function render()
    {
        if ($this->file !== null) {
            $uploadConversionService = new UploadConversionService();
            $document = $uploadConversionService->uploadFile($this->file);
            $this->file = null;
            $this->setDocument($document);
        }

        return view('fedex::livewire.upload_file');
    }
}
