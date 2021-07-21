<?php

namespace EXACTSports\FedEx\Base;

class Location
{
    public string $id; // N - ID belonging to FedEx Office where order will be picked up. If pickUpDelivery is present in request, then location ID must be present
}
