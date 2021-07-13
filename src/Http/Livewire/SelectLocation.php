<?php 

namespace EXACTSports\FedEx\Http\Livewire;

use Livewire\Component; 
use EXACTSports\FedEx\Http\Services\FedexService;

class SelectLocation extends Component 
{
    public string $distance = "5-Miles"; 
    public string $address = ""; 
    
    /**
     * Search locations.
     * @param $documents Documents
     */
    public function searchLocations()
    {
        $fedexService = new FedexService();
        $deliveryOptions = [];

        $deliveryOptions = [
            "deliveryOptionsRequest" => [
                "products" => [],
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
