<?php 

namespace EXACTSports\FedEx\LocationService;

use EXACTSports\FedEx\Base\BaseWebAuthenticationDetail;
use EXACTSports\FedEx\LocationService\ParentCredential;

class WebAuthenticationDetail extends BaseWebAuthenticationDetail
{
    public ParentCredential $parentCredential;
    
    public function __construct()
    {
        $this->parentCredential = new ParentCredential();
        parent::__construct();
    }
}