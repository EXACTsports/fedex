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
    protected $listeners = ['setNewPrintOptions'];
    public array $printOptions = [];
    public string $selectedText = '';
    public array $sizes = [
        '1448986650332' => [
                'targetHeightInInches' => '11',
                'targetWidthInInches' => '8.5',
            ],
    ];
    public array $productFeatures = [];
    public int $documentIndex = 0;

    public function mount()
    {
        $this->printOptions = PrintOptionService::$options;
    }

    public function render()
    {
        return view('fedex::livewire.print_options.set_print_options');
    }
}
