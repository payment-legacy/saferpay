<?php

namespace Payment\Saferpay;


class SaferpayData implements SaferpayDataInterface
{
    /**
     * @var SaferpayKeyValue
     */
    protected $initData;

    /**
     * @var SaferpayKeyValue
     */
    protected $confirmData;

    /**
     * @var SaferpayKeyValue
     */
    protected $completeData;

    /**
     * @param SaferpayKeyValue $data
     * @return self
     */
    public function setInitData(SaferpayKeyValue $data)
    {
        $this->initData = $data;
        return $this;
    }

    /**
     * @return SaferpayKeyValue
     */
    public function getInitData()
    {
        return $this->initData;
    }

    /**
     * @param SaferpayKeyValue $data
     * @return self
     */
    public function setConfirmData(SaferpayKeyValue $data)
    {
        $this->confirmData = $data;
        return $this;
    }

    /**
     * @return SaferpayKeyValue
     */
    public function getConfirmData()
    {
        return $this->confirmData;
    }

    /**
     * @param SaferpayKeyValue $data
     * @return self
     */
    public function setCompleteData(SaferpayKeyValue $data)
    {
        $this->completeData = $data;
        return $this;
    }

    /**
     * @return SaferpayKeyValue
     */
    public function getCompleteData()
    {
        return $this->completeData;
    }
}