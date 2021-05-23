<?php 

namespace EXACTSports\FedEx\Base;

use EXACTSports\FedEx\Base\UserCredential; 
use EXACTSports\FedEx\Base\Interfaces\WebAuthenticationDetailInterface; 

class BaseWebAuthenticationDetail 
    implements WebAuthenticationDetailInterface
{
    public UserCredential $userCredential;
    
    public function __construct()
    {
        $this->userCredential = new UserCredential();
    }
}