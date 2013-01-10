<?php

namespace Payment\Saferpay\Data;

class SaferpayData implements SaferpayDataInterface
{
    /**
     * @var DataInterface
     */
    protected $initData;

    /**
     * @var DataInterface
     */
    protected $confirmData;

    /**
     * @var DataInterface
     */
    protected $completeData;

    /**
     * @param DataInterface $data
     * @return self
     */
    public function setInitData(DataInterface $data)
    {
        $this->initData = $data;
        return $this;
    }

    /**
     * @return DataInterface
     */
    public function getInitData()
    {
        return $this->initData;
    }

    /**
     * @param DataInterface $data
     * @return self
     */
    public function setConfirmData(DataInterface $data)
    {
        $this->confirmData = $data;
        return $this;
    }

    /**
     * @return DataInterface
     */
    public function getConfirmData()
    {
        return $this->confirmData;
    }

    /**
     * @param DataInterface $data
     * @return self
     */
    public function setCompleteData(DataInterface $data)
    {
        $this->completeData = $data;
        return $this;
    }

    /**
     * @return DataInterface
     */
    public function getCompleteData()
    {
        return $this->completeData;
    }
}