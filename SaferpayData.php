<?php

namespace Payment\Saferpay;


class SaferpayData implements SaferpayDataInterface
{
    /**
     * @var string
     */
    protected $initSignature;

    /**
     * @var string
     */
    protected $confirmSignature;

    /**
     * @var string
     */
    protected $completeSignature;

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
     * @param string $signature
     * @return self
     */
    public function setInitSignature($signature)
    {
        $this->initSignature = $signature;
        return $this;
    }

    /**
     * @return string
     */
    public function getInitSignature()
    {
        return $this->initSignature;
    }

    /**
     * @param string $signature
     * @return self
     */
    public function setConfirmSignature($signature)
    {
        $this->confirmSignature = $signature;
        return $this;
    }

    /**
     * @return string
     */
    public function getConfirmSignature()
    {
        return $this->confirmSignature;
    }

    /**
     * @param string $signature
     * @return self
     */
    public function setCompleteSignature($signature)
    {
        $this->completeSignature = $signature;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompleteSignature()
    {
        return $this->completeSignature;
    }

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