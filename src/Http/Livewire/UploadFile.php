<?php 

namespace EXACTSports\FedEx\Http\Livewire;

use Livewire\Component; 
use Livewire\WithFileUploads;
use EXACTSports\FedEx\DocumentUpload\DocumentFromLocalDrive;
use EXACTSports\FedEx\Conversion\Options;
use EXACTSports\FedEx\Http\Services\FedExService;
use EXACTSports\FedEx\FedExTrait;

class UploadFile extends Component
{
    use WithFileUploads;
    use FedExTrait;

    public array $documents = [];
    public $file = null;
    private $defaultRecipients = [];
    private $rateRequest = [];
    protected $listeners = ['updateDocuments'];

    /**
     * Updates documents
     * @param array $documents
     */
    public function updateDocuments($documents)
    {
        $this->emit("showLoader", false);
        $this->documents = $documents;
    }

    public function render()
    {
        if ($this->file !== null) {
            $documentFromLocalDrive = new DocumentFromLocalDrive();
            $fedExService = new FedExService();
            
            // Upload document
            $documentFromLocalDrive->contents = file_get_contents($this->file->getRealPath());
            $documentFromLocalDrive->filename = $this->file->getClientOriginalName();
            $response = $fedExService->uploadDocumentFromLocalDrive((array) $documentFromLocalDrive);
            $fileName = $response->output->document->documentName;
            $documentId = $response->output->document->documentId;
            
            // Convert to pdf 
            $options = new Options();
            $options = json_decode(json_encode($options), true);
            $options = $this->removeEmptyElements($options);
            $response = $fedExService->convertToPdf($documentId, $options);
            $document = $response->output->document;
            $parentDocumentId = $document->parentDocumentId;
            $documentId = $document->documentId;
            
            // Document preview
            $response = $fedExService->getDocumentPreview($documentId);
            $image = $response->output->imageByteStream;
            
            $document = new \stdClass();
            $document->fileName = $fileName;
            $document->parentDocumentId = $parentDocumentId;
            $document->documentId = $documentId;
            $document->image = 'data:image/png;base64,' . $image;
            $document->totalAmount = 0;

            $this->file = null;

            $this->emit('setDocuments', $document);
        }
        
        return view("fedex::livewire.upload_file");
    }
}
