<?php

namespace EXACTSports\FedEx;

class FedExException
{
    private \SoapFault $e; 
    
    public function __construct(\SoapFault $e) 
    {
        $this->e = $e; 
    }
    
    /**
     * Gets error details
     */
    public function getErrorDetails() 
    {
        return array(
            "code" => $this->e->getCode(),
            "message" => $this->e->getMessage(),
            "detail" => array(
                "cause" => $this->e->detail->cause,
                "code" => $this->e->detail->code,
                "description" => $this->e->detail->desc
            )
        ); 
    }
}