<?php

namespace EXACTSports\FedEx\Http\Livewire\PrintOptions;

use EXACTSports\FedEx\Base\Product\ContentAssociation;
use EXACTSports\FedEx\Base\ProductAssociation;
use EXACTSports\FedEx\Base\Recipient;
use EXACTSports\FedEx\Http\Services\PrintOptionService;
use EXACTSports\FedEx\Http\Services\FedExService;
use EXACTSports\FedEx\Http\Services\ProductService;
use EXACTSports\FedEx\Rates\RateRequest;
use Livewire\Component;

class SetPrintOptions extends Component
{
    public array $document = [];
    protected $listeners = ['updateDocument', 'selectDocumentPrintOption'];
    public array $printOptions = [];
    public string $selectedText = '';
    public array $sizes = [
        '1448986650332' => [
                'targetHeightInInches' => '11',
                'targetWidthInInches' => '8.5',
            ],
    ];

    public function mount()
    {
        $this->printOptions = PrintOptionService::$options;
    }

    /**
     * Updates document.
     */
    public function updateDocument(array $document)
    {
        $this->document = $document;
    }

    /**
     * Selects document print option.
     */
    public function updatePrintOptions(string $productId, string $optionId, string $documentId)
    {
        // If is being updated the paper size, we convert the pdf again
        if ($productId === '1448981549109') {
            $size = $this->sizes[$optionId];
            $options = new Options();

            $options->input->conversionOptions->targetHeightInInches = $size['targetHeightInInches'];
            $options->input->conversionOptions->targetWidthInInches = $size['targetWidthInInches'];
            $options = json_decode(json_encode($options), true);
            $options = $this->removeEmptyElements($options);
            $response = $fedExService->convertToPdf($documentId, $options);
        }
        // $this->emit("updatePrintOptions", $productId, $optionId);
    }

    public function render()
    {
        return view('fedex::livewire.print_options.set_print_options',
            [
                'document' => $this->document,
                'printOptions' => $this->printOptions,
            ]
        );
    }
}
