<?php

namespace EXACTSports\FedEx\Base;

class ProductAssociation
{
    public string $id;  // N - This should be the instance ID of the respective product that is present in the request

    public int $quantity;    // N - Quantity given at product level must be equal to sum of quantities in product association for the same product
}
