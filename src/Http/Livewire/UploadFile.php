<?php 

namespace EXACTSports\FedEx\Http\Livewire;

use Livewire\Component; 
use Livewire\WithFileUploads;
use EXACTSPorts\FedEx\Http\Services\FedexService;

class UploadFile extends Component 
{
    use WithFileUploads;

    public array $documents = [];
    public $file;

    public function render()
    {
        if ($this->file !== null) {
            $fedexService = new FedexService();
            $response = $fedexService->uploadDocumentFromLocalDrive($this->file->getRealPath(), $this->file->getClientOriginalName());
            $fileName = $response["output"]["document"]["documentName"];
            array_push($this->documents, $fileName);
        }
        
        return view("fedex::livewire.upload_file", ["documents" => $this->documents]);
    }
}
