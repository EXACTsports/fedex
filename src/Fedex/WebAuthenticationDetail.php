<?php 

namespace EXACTSports\FedEx\Fedex;

use EXACTSports\FedEx\Fedex\UserCredential; 

class WebAuthenticationDetail
{
    public UserCredential $userCredential;

    public function __construct(UserCredential $userCredential)
    {
        $this->userCredential = $userCredential;
    }
}