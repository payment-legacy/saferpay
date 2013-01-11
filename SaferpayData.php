<?php

namespace Payment\Saferpay;


class SaferpayData implements SaferpayDataInterface
{
    /**
     * @var \ArrayAccess
     */
    protected $initData;

    /**
     * @var \ArrayAccess
     */
    protected $confirmData;

    /**
     * @var \ArrayAccess
     */
    protected $completeData;

    /**
     * @param \ArrayAccess $data
     * @return self
     */
    public function setInitData(\ArrayAccess $data)
    {
        $this->initData = $data;
        return $this;
    }

    /**
     * @return \ArrayAccess
     */
    public function getInitData()
    {
        return $this->initData;
    }

    /**
     * @param \ArrayAccess $data
     * @return self
     */
    public function setConfirmData(\ArrayAccess $data)
    {
        $this->confirmData = $data;
        return $this;
    }

    /**
     * @return \ArrayAccess
     */
    public function getConfirmData()
    {
        return $this->confirmData;
    }

    /**
     * @param \ArrayAccess $data
     * @return self
     */
    public function setCompleteData(\ArrayAccess $data)
    {
        $this->completeData = $data;
        return $this;
    }

    /**
     * @return \ArrayAccess
     */
    public function getCompleteData()
    {
        return $this->completeData;
    }
}