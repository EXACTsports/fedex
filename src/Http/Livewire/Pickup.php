<?php

namespace EXACTSports\FedEx\Http\Livewire;

use EXACTSports\FedEx\Http\Services\FedexService;
use Livewire\Component;

class Pickup extends Component
{
    public string $radius = '5-Miles';
    public string $postalCode = '';

    public function render()
    {
        return view('fedex::livewire.pickup');
    }

    /**
     * Searches locations.
     */
    public function searchLocations()
    {
        $array = explode('-', $this->radius);
        $value = $array[0];
        $unit = $array[1];

        $options = [
            'deliveryOptionsRequest' => [
                'products' => [
                    [
                        'id' => '12583697834063851367614988597531446591280',
                        'instanceId' => '1508784838901',
                        'qty' => 1,
                        'contentAssociations' => [
                            [
                                'parentContentReference' => '12583436838121541302714336603881770305060',
                                'contentReference' => '12583697834063851367614988597531446591280',
                                'name' => 'Test',
                                'printReady' => true,
                                'pageGroups' => [
                                    [
                                        'startPageNum' => 1,
                                        'endPageNum' => 1,
                                        'pageWidthInches' => 8.5,
                                        'pageHeightInches' => 11.0,
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
                'deliveries' => [
                    [
                        'address' => [
                            'streetLines' => ['7900 Legacy Drive'],
                            'city' => 'Plano',
                            'stateOrProvinceCode' => 'TX',
                            'postalCode' => '75024',
                            'countryCode' => 'US',
                            'addressClassification' => 'Home',
                        ],
                        'holdUntilDate' => '',
                        'requestedDeliveryTypes' => [
                            'requestedPickup' => [
                                'resulstsPickup' => [
                                    'resultsRequested' => 2,
                                    'searchRadius' => [
                                        'value' => 200,
                                        'MILES',
                                    ],
                                ],
                            ],
                                    ],
                        'productAssociations' => [
                            [
                                'id' => '1508784838901',
                                'quantity' => 1,
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
