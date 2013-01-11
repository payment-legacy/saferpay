<?php

namespace Payment\Saferpay;


class SaferpayHelper
{
    /**
     * @param \ArrayObject $map
     * @param array $data
     * @return \ArrayObject
     */
    static public function fillMap(\ArrayObject $map, array $data)
    {
        foreach($data as $key => $value)
        {
            $map->offsetSet($key, $value);
        }

        return $map;
    }
}