<?php

namespace EXACTSports\FedEx;


class GetUploadLocation
{
    use FedEx;

    public function __construct(public Client $client)
    {
    }

}
