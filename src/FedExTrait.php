<?php

namespace EXACTSports\FedEx;

trait FedExTrait
{
    public function toArray(): array
    {
        $array = json_decode(json_encode($this), true, 512, JSON_THROW_ON_ERROR);
        $array = $this->ucFirstKeys($array);

        return $this->removeEmptyElements($array);
    }

    private function removeEmptyElements(array $array) : array
    {
        foreach ($array as $key => &$value) {
            if ($value !== '0' && empty($value)) {
                unset($array[$key]);
            } else {
                if (is_array($value)) {
                    $value = $this->removeEmptyElements($value);
                    if (empty($value)) {
                        unset($array[$key]);
                    }
                }
            }
        }

        return $array;
    }

    private function ucFirstKeys(array $array): array
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

    public function objectToArray(object $object) : array
    {
        return json_decode(json_encode($object), true);
    }
}
