<?php

namespace Payment\Saferpay;


class SaferpayData implements SaferpayDataInterface
{
    /**
     * @var SaferpayAttribute
     */
    protected $initData;

    /**
     * @var SaferpayAttribute
     */
    protected $confirmData;

    /**
     * @var SaferpayAttribute
     */
    protected $completeData;

    /**
     * @param SaferpayAttribute $data
     * @return self
     */
    public function setInitData(SaferpayAttribute $data)
    {
        $this->initData = $data;
        return $this;
    }

    /**
     * @return SaferpayAttribute
     */
    public function getInitData()
    {
        return $this->initData;
    }

    /**
     * @param SaferpayAttribute $data
     * @return self
     */
    public function setConfirmData(SaferpayAttribute $data)
    {
        $this->confirmData = $data;
        return $this;
    }

    /**
     * @return SaferpayAttribute
     */
    public function getConfirmData()
    {
        return $this->confirmData;
    }

    /**
     * @param SaferpayAttribute $data
     * @return self
     */
    public function setCompleteData(SaferpayAttribute $data)
    {
        $this->completeData = $data;
        return $this;
    }

    /**
     * @return SaferpayAttribute
     */
    public function getCompleteData()
    {
        return $this->completeData;
    }
}