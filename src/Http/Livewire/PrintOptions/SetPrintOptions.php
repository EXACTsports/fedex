<?php

namespace EXACTSports\FedEx\Http\Livewire\PrintOptions;

use EXACTSports\FedEx\Base\Product\ContentAssociation;
use EXACTSports\FedEx\Base\ProductAssociation;
use EXACTSports\FedEx\Base\Recipient;
use EXACTSports\FedEx\Http\Services\FedExService;
use EXACTSports\FedEx\Http\Services\ProductService;
use EXACTSports\FedEx\Rates\RateRequest;
use Livewire\Component;

class SetPrintOptions extends Component
{
    public array $document = [];
    protected $listeners = ['updateDocument', 'selectDocumentPrintOption'];
    public array $printOptions = [
        [
            'id' => '1448981549109',
            'name' => 'Size',
            'options' => [
                '1448986650332' => '8.5" x 11"',
                '1448986650652' => '8.5" x 14"',
                '1448986651164' => '11" x 17"',
            ],
        ],
        [
            'id' => '1448981549741',
            'name' => 'Paper',
            'options' => [
                'withMenu' => [
                    [
                        'head' => 'Standar White Papers',
                        'description' => 'Everyday paper, 20-32 lb',
                        'options' => [
                            '1448988661630' => 'Laser (24 lb.)',
                            '1448988664295' => 'Laser (32 lb.)',
                        ],
                        'default' => 'Laser (32 lb.)',
                    ],
                    [
                        'head' => 'Professional White Papers',
                        'description' => 'Thicker, higher-quality paper, 32lb+',
                        'options' => [
                            '1448988661630' => 'Laser (60 lb.)',
                            '1448988664295' => 'Gloss Cover (100 lb.)',
                        ],
                    ],
                ],
            ],
        ],
        [
            'id' => '1448981549581',
            'name' => 'Color/Black & White',
            'options' => [
                '1448988600611' => 'Full Color',
            ],
        ],
        [
            'id' => '1448981549269',
            'name' => 'Sides',
            'options' => [
                '1448988124560' => 'Single-Sided',
            ],
        ],
        [
            'id' => '1448984679218',
            'name' => 'Orientation',
            'options' => [
                '1449000016192' => 'Portrait',
                '1449000016327' => 'Landscape',
            ],
        ],
    ];
    public string $selectedText = '';
    public array $sizes = [
        '1448986650332' => [
                'targetHeightInInches' => '11',
                'targetWidthInInches' => '8.5',
            ],
    ];

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
