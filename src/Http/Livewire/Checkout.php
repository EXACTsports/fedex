<?php 

namespace EXACTSports\FedEx\Http\Livewire;

use Livewire\Component; 
use EXACTSports\FedEx\Http\Services\FedexService;

class Checkout extends Component 
{
   protected $listeners = ['checkout', 'orderSubmission'];
   public $documents = [];
   private FedexService $fedexService;

   public function __construct()
   {
      $this->fedexService = new FedexService();
   }

   public function checkout($documents)
   {
      $this->documents = $documents;
   }

   /**
    * Order submission
    */
   public function orderSubmission(array $contentAssociations)
   {
      $encryptedData = $this->fedexService->getEncryptedData();
      $orderSubmissionRequest = [
         "orderSubmissionRequest" => [
            "orderContact" => [
               "contact" => [
                  "company" => [
                     "name" => "fedex" 
                  ], 
                  "emailDetail" => [
                     "emailAddress" => "bob.hiestand@fedex.com" 
                  ], 
                  "personName" => [
                              "firstName" => "Bob", 
                              "lastName" => "Hiestand" 
                           ], 
                  "phoneNumberDetails" => [
                     [
                        "phoneNumber" => [
                           "number" => "(214) 550-7534" 
                        ], 
                        "usage" => "Primary" 
                     ] 
                  ] 
               ] 
            ], 
            "products" => [
               [
                  "id" => "1456773326927", 
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
                     ], 
                     [
                        "id" => "1448981549741", 
                        "name" => "Paper Type", 
                        "choice" => [
                           "id" => "1448988664295", 
                           "name" => "Laser (32 lb.)", 
                           "properties" => [
                              [
                                 "id" => "1450324098012", 
                                 "name" => "MEDIA_TYPE", 
                                 "value" => "E32" 
                              ], 
                              [
                                 "id" => "1453234015081", 
                                 "name" => "PAPER_COLOR", 
                                 "value" => "#FFFFFF" 
                              ], 
                              [
                                 "id" => "1471275182312", 
                                 "name" => "MEDIA_CATEGORY", 
                                 "value" => "RESUME" 
                              ] 
                           ] 
                        ] 
                     ], 
                     [
                        "id" => "1448981549581", 
                        "name" => "Print Color", 
                        "choice" => [
                           "id" => "1448988600611", 
                           "name" => "Full Color", 
                           "properties" => [
                              [
                                 "id" => "1453242778807", 
                                 "name" => "PRINT_COLOR", 
                                 "value" => "COLOR" 
                              ] 
                           ] 
                        ] 
                     ], 
                     [
                        "id" => "1448981549269", 
                        "name" => "Sides", 
                        "choice" => [
                           "id" => "1448988124560", 
                           "name" => "Single-Sided", 
                           "properties" => [
                              [
                                 "id" => "1461774376168", 
                                 "name" => "SIDE", 
                                 "value" => "SINGLE" 
                              ], 
                              [
                                 "id" => "1471294217799", 
                                 "name" => "SIDE_VALUE", 
                                 "value" => "1" 
                              ] 
                           ] 
                        ] 
                     ], 
                     [
                        "id" => "1448984679218", 
                        "name" => "Orientation", 
                        "choice" => [
                           "id" => "1449000016192", 
                           "name" => "Vertical", 
                           "properties" => [
                              [
                                 "id" => "1453260266287", 
                                 "name" => "PAGE_ORIENTATION", 
                                 "value" => "PORTRAIT" 
                              ] 
                           ] 
                        ] 
                     ], 
                     [
                        "id" => "1448981554101", 
                        "name" => "Prints Per Page", 
                        "choice" => [
                           "id" => "1448990257151", 
                           "name" => "One", 
                           "properties" => [
                              [
                                 "id" => "1455387404922", 
                                 "name" => "PRINTS_PER_PAGE", 
                                 "value" => "ONE" 
                              ] 
                           ] 
                        ] 
                     ], 
                     [
                        "id" => "1448984877869", 
                        "name" => "Cutting", 
                        "choice" => [
                           "id" => "1448999392195", 
                           "name" => "None", 
                           "properties" => [] 
                        ] 
                     ], 
                     [
                        "id" => "1448981555573", 
                        "name" => "Hole Punching", 
                        "choice" => [
                           "id" => "1448999902070", 
                           "name" => "None", 
                           "properties" => [
                           ] 
                        ] 
                     ], 
                     [
                        "id" => "1448984877645", 
                        "name" => "Folding", 
                        "choice" => [
                           "id" => "1448999720595", 
                           "name" => "None", 
                           "properties" => [
                           ] 
                        ] 
                     ], 
                     [
                        "id" => "1448981532145", 
                        "name" => "Collation", 
                        "choice" => [
                           "id" => "1448986654687", 
                           "name" => "Collated", 
                           "properties" => [
                              [
                                 "id" => "1449069945785", 
                                 "name" => "COLLATION_TYPE", 
                                 "value" => "MACHINE" 
                              ] 
                           ] 
                        ] 
                     ], 
                     [
                        "id" => "1448981554597", 
                        "name" => "Binding", 
                        "choice" => [
                           "id" => "1448997199553", 
                           "name" => "None", 
                           "properties" => [
                           ] 
                        ] 
                     ], 
                     [
                        "id" => "1448984679442", 
                        "name" => "Lamination", 
                        "choice" => [
                           "id" => "1448999458409", 
                           "name" => "None", 
                           "properties" => [
                           ] 
                        ] 
                     ] 
                  ] 
               ] 
            ], 
            "recipients" => [
               [
                  "contact" => [
                     "personName" => [
                        "firstName" => "john", 
                        "lastName" => "smith" 
                     ], 
                     "emailDetail" => [
                        "emailAddress" => "email@mail.com" 
                     ], 
                     "phoneNumberDetails" => [
                        [
                           "phoneNumber" => [
                              "number" => "(986) 786-7856", 
                              "extension" => "123" 
                           ], 
                           "usage" => "PRIMARY" 
                        ] 
                     ] 
                  ], 
                  "pickUpDelivery" => [
                     "location" => [
                        "id" => "9914" 
                     ] 
                  ], 
                  "productAssociations" => [
                     [
                        "id" => "1508784838901", 
                        "quantity" => 1 
                     ] 
                  ] 
               ] 
            ], 
            "payments" => [
               [
                  "creditCard" => [
                     "billingAddress" => [
                        "city" => "Baltimore", 
                        "countryCode" => "US", 
                        "postalCode" => "21218", 
                        "stateOrProvinceCode" => "MD", 
                        "streetLines" => [
                           "3614 Delverne Rd" 
                        ] 
                     ], 
                     "cardHolderName" => "Test Card", 
                     "encryptedCreditCard" => $encryptedData,
                     "expirationMonth" => "11", 
                     "expirationYear" => "2022", 
                     "type" => "VISA" 
                  ] 
               ] 
               
            ] 
         ] 
      ]; 
      
      $response = $this->fedexService->orderSubmisions($orderSubmissionRequest);
      echo "<pre>";
      print_r($response);
      echo "</pre>";
      die;
    }

    public function render()
    {
        return view("fedex::livewire.checkout", $this->documents);
    }
}
