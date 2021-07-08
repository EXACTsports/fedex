<?php 

namespace EXACTSports\FedEx\Http\Livewire;

use Livewire\Component; 
use EXACTSPorts\FedEx\Http\Services\FedexService;

class Pickup extends Component 
{
    public string $radius = "5-Miles";
    public string $postalCode = ""; 

    public function render()
    {
        return view("fedex::livewire.pickup");
    }

    /**
     * Searches locations
     */
    public function searchLocations()
    {
        $array = explode("-", $this->radius);
        $value = $array[0];
        $unit = $array[1];
        
        $options = array(
            "deliveryOptionsRequest" => array(
                "products" => array(
                    array(
                        "id" => "12583697834063851367614988597531446591280",
                        "instanceId" => "1508784838901",
                        "qty" => 1,
                        "contentAssociations" => array(
                            array(
                                "parentContentReference" => "12583436838121541302714336603881770305060",
                                "contentReference" => "12583697834063851367614988597531446591280",
                                "name" => "Test",
                                "printReady" => true,
                                "pageGroups" => array(
                                    array(
                                        "startPageNum" => 1,
                                        "endPageNum" => 1,
                                        "pageWidthInches" => 8.5,
                                        "pageHeightInches" => 11.0
                                    )
                                )
                            )
                        )
                    )
                ),
                "deliveries" => array(
                    array(
                        "address" => array(
                            "streetLines" => array("7900 Legacy Drive"),
                            "city" => "Plano",
                            "stateOrProvinceCode" => "TX",
                            "postalCode" => "75024",
                            "countryCode" => "US",
                            "addressClassification" => "Home"
                        ),
                        "holdUntilDate" => "",
                        "requestedDeliveryTypes" => array(
                            "requestedPickup" => array(
                                "resulstsPickup" => array(
                                    "resultsRequested" => 2,
                                    "searchRadius" => array(
                                        "value" => 200,
                                        "MILES"
                                    )
                                )
                            )
                                    ),
                        "productAssociations" => array(
                            array(
                                "id" => "1508784838901",
                                "quantity" => 1
                            )
                        )
                    )
                )
            )
        );
    }
}