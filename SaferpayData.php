<?php

namespace Payment\Saferpay;

use Ardent\Map as MapInterface;

class SaferpayData implements SaferpayDataInterface
{
    /**
     * @var MapInterface
     */
    protected $initData;

    /**
     * @var MapInterface
     */
    protected $confirmData;

    /**
     * @var MapInterface
     */
    protected $completeData;

    /**
     * @param MapInterface $data
     * @return self
     */
    public function setInitData(MapInterface $data)
    {
        $this->initData = $data;
        return $this;
    }

    /**
     * @return MapInterface
     */
    public function getInitData()
    {
        return $this->initData;
    }

    /**
     * @param MapInterface $data
     * @return self
     */
    public function setConfirmData(MapInterface $data)
    {
        $this->confirmData = $data;
        return $this;
    }

    /**
     * @return MapInterface
     */
    public function getConfirmData()
    {
        return $this->confirmData;
    }

    /**
     * @param MapInterface $data
     * @return self
     */
    public function setCompleteData(MapInterface $data)
    {
        $this->completeData = $data;
        return $this;
    }

    /**
     * @return MapInterface
     */
    public function getCompleteData()
    {
        return $this->completeData;
    }
}