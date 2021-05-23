<?php 

namespace EXACTSports\FedEx;

use EXACTSports\FedEx\FedExTrait; 
use EXACTSports\FedEx\LocationService\WebAuthenticationDetail; 
use EXACTSports\FedEx\LocationService\ClientDetail; 
use EXACTSports\FedEx\Base\TransactionDetail; 
use EXACTSports\FedEx\Base\Version; 
use EXACTSports\FedEx\LocationService\UniqueTrackingNumber;
use EXACTSports\FedEx\LocationService\Address;
use EXACTSports\FedEx\LocationService\SortDetail; 
use EXACTSports\FedEx\LocationService\Constraints;

class SearchLocations 
{
    use FedexTrait {
        FedexTrait::__construct as ___construct;
    } 

    public date $efectiveDate;
    public string|null $locationsSearchCriterion; // Required - Valid values: ADDRESS, GEOGRAPHIC_COORDINATES, PHONE_NUMBER
    public string|null $shipperAccountNumber;
    public UniqueTrackingNumber $uniqueTrackingNumber;
    public Address $address; 
    public string|null $phoneNumber;
    public string|null $geograpicCoordinates;
    public string|null $multipleMatchesAction;
    public SortDetail $sortDetail;
    public Constraints $constraints;

    public function __construct(
        WebAuthenticationDetail $webAuthenticationDetail,
        ClientDetail $clientDetail,
        TransactionDetail $transactionDetail,
        Version $version,
        Address $address,
        SortDetail $sortDetail,
        Constraints $constraints
    )
    {
        $version->serviceId = "locs";
        $version->major = "12";
        $version->intermediate = "0";

        $this->___construct(
            $webAuthenticationDetail,
            $clientDetail,
            $transactionDetail,
            $version
        );

        $this->address = new Address();
        $this->sortDetail = new SortDetail();
        $this->constraints = new Constraints();
    }    
}