<?php 

namespace EXACTSports\FedEx\LocationsService;

use EXACTSports\FedEx\Base\BaseWebAuthenticationDetail;
use EXACTSports\FedEx\LocationsService\ParentCredential;

class WebAuthenticationDetail extends BaseWebAuthenticationDetail
{
    public ParentCredential $parentCredential;
    
    public function __construct()
    {
        $this->parentCredential = new ParentCredential();
        parent::__construct();
    }
}