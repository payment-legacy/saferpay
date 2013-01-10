<?php

namespace Payment\Saferpay;

use Ardent\Map as MapInterface;

class SaferpayHelper
{
    /**
     * @param MapInterface $map
     * @param array $data
     * @return MapInterface
     */
    static public function fillMap(MapInterface $map, array $data)
    {
        foreach($data as $key => $value)
        {
            $map->insert($key, $value);
        }

        return $map;
    }
}