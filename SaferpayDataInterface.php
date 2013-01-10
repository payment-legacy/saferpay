<?php

namespace Payment\Saferpay;

use Ardent\Map as MapInterface;

interface SaferpayDataInterface
{
    /**
     * @param MapInterface $data
     * @return self
     */
    public function setInitData(MapInterface $data);

    /**
     * @return MapInterface
     */
    public function getInitData();

    /**
     * @param MapInterface $data
     * @return self
     */
    public function setConfirmData(MapInterface $data);

    /**
     * @return MapInterface
     */
    public function getConfirmData();

    /**
     * @param MapInterface $data
     * @return self
     */
    public function setCompleteData(MapInterface $data);

    /**
     * @return MapInterface
     */
    public function getCompleteData();
}