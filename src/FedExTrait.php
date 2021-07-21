<?php

namespace EXACTSports\FedEx;

use EXACTSports\FedEx\Base\Interfaces\ClientDetailInterface;
use EXACTSports\FedEx\Base\Interfaces\WebAuthenticationDetailInterface;
use EXACTSports\FedEx\Base\OrderRecipient;
use EXACTSports\FedEx\Base\RequestedOfficeOrder;
use EXACTSports\FedEx\Base\Response;
use EXACTSports\FedEx\Base\TransactionDetail;
use EXACTSports\FedEx\Base\Version;
use EXACTSports\FedEx\Client;

trait FedExTrait
{
    public WebAuthenticationDetailInterface $webAuthenticationDetail;
    public ClientDetailInterface $clientDetail;
    public TransactionDetail $transactionDetail;
    public Version $version;
    public RequestedOfficeOrder $requestedOfficeOrder;

    /**
     * Converts object to array.
     * @param $object
     * @return array
     */
    public function toArray()
    {
        $array = json_decode(json_encode($this), true);
        $array = $this->ucFirstKeys($array);
        $array = $this->removeEmptyElements($array);

        return $array;
    }

    /**
     * Remove empty elements.
     */
    private function removeEmptyElements(array $array) : array
    {
        foreach ($array as $key => &$value) {
            if ($value !== '0' && empty($value)) {
                unset($array[$key]);
            } else {
                if (is_array($value)) {
                    $value = $this->removeEmptyElements($value);
                    if ($value !== '0' && empty($value)) {
                        unset($array[$key]);
                    }
                }
            }
        }

        return $array;
    }

    /**
     * Capitalizes first chart of array keys.
     * @param array $array
     * @return array
     */
    private function ucFirstKeys($array)
    {
        $request = [];

        foreach ($array as $key => $value) {
            $ucKey = ucfirst($key);
            $request[$ucKey] = $value;

            if (is_array($value)) {
                $request[$ucKey] = $this->ucFirstKeys($value);
            }
        }

        return $request;
    }

    /**
     * Converts to array.
     * @param object $object
     * @return array
     */
    public function objectToArray(object $object) : array
    {
        return json_decode(json_encode($object), true);
    }
}
