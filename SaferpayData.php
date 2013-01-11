<?php

namespace Payment\Saferpay;


class SaferpayData implements SaferpayDataInterface
{
    /**
     * @var \ArrayObject
     */
    protected $initData;

    /**
     * @var \ArrayObject
     */
    protected $confirmData;

    /**
     * @var \ArrayObject
     */
    protected $completeData;

    /**
     * @param \ArrayObject $data
     * @return self
     */
    public function setInitData(\ArrayObject $data)
    {
        $this->initData = $data;
        return $this;
    }

    /**
     * @return \ArrayObject
     */
    public function getInitData()
    {
        return $this->initData;
    }

    /**
     * @param \ArrayObject $data
     * @return self
     */
    public function setConfirmData(\ArrayObject $data)
    {
        $this->confirmData = $data;
        return $this;
    }

    /**
     * @return \ArrayObject
     */
    public function getConfirmData()
    {
        return $this->confirmData;
    }

    /**
     * @param \ArrayObject $data
     * @return self
     */
    public function setCompleteData(\ArrayObject $data)
    {
        $this->completeData = $data;
        return $this;
    }

    /**
     * @return \ArrayObject
     */
    public function getCompleteData()
    {
        return $this->completeData;
    }
}