<?php

namespace Payment\Saferpay;


class SaferpayHelper
{
    /**
     * @param \ArrayAccess $map
     * @param array $data
     * @return \ArrayAccess
     */
    static public function fillMap(\ArrayAccess $map, array $data)
    {
        foreach($data as $key => $value)
        {
            $map->offsetSet($key, $value);
        }

        return $map;
    }
}