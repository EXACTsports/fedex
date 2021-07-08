<?php 

namespace EXACTSports\FedEx\Http\Livewire;

use Livewire\Component; 
use EXACTSports\FedEx\Http\Services\FedexService;

class SelectLocation extends Component 
{
    protected $listeners = ['searchLocations'];
    public string $distance = "5-Miles"; 
    public string $address = ""; 

    /**
     * Search locations.
     * @param $documents Documents
     */
    public function searchLocations($contentAssociations = [])
    {
        $fedexService = new FedexService();
        $deliveryOptions = [];

        $deliveryOptions = [
            "deliveryOptionsRequest" => [
                "products" => [
                    [  
                        "id" => "1508784838900", 
                        "name" => "", 
                        "version" => 0, 
                        "instanceId" => "1508784838901", 
                        "qty" => 1, 
                        "properties" => [], 
                        "contentAssociations" => $contentAssociations, 
                        "features" => [
                            [
                                "id" => "1448981549109", 
                                "name" => "Paper Size", 
                                "choice" => [
                                    "id" => "1448986650332", 
                                    "name" => "8.5x11", 
                                    "properties" => [
                                        [
                                            "id" => "1449069906033", 
                                            "name" => "MEDIA_HEIGHT", 
                                            "value" => "11" 
                                        ], 
                                        [
                                            "id" => "1449069908929", 
                                            "name" => "MEDIA_WIDTH", 
                                            "value" => "8.5" 
                                        ] 
                                    ] 
                                ] 
                            ] 
                        ] 
                    ] 
                ], 
                "deliveries" => [
                    [
                        "deliveryReference" => null, 
                        "address" => [
                            "streetLines" => [
                                "7900 Legacy Drive" 
                            ], 
                            "city" => "Plano", 
                            "stateOrProvinceCode" => "TX", 
                            "postalCode" => "75024", 
                            "countryCode" => "US", 
                            "addressClassification" => "HOME" 
                        ], 
                        "holdUntilDate" => "", 
                        "requestedDeliveryTypes" => [
                                "requestedPickup" => [
                                    "resultsRequested" => 10, 
                                    "searchRadius" => [
                                        "value" => 200, 
                                        "unit" => "MILES" 
                                    ] 
                                ] 
                        ], 
                        "productAssociations" => [
                            [
                                "id" => "1508784838901", 
                                "quantity" => 1 
                            ] 
                        ] 
                    ] 
                ] 
            ] 
        ]; 

        $response = $fedexService->getDeliveryOptions($deliveryOptions);
        $locations = $response["output"]["deliveryOptions"][0]["pickupOptions"]; 
        $this->emit("setLocations", $locations);
    }

    public function render()
    {
        return view("fedex::livewire.select_location", 
            [
                "distance" => $this->distance,
                "address" => $this->address
            ] 
        );
    }
}
