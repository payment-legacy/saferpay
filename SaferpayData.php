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
     * @var SaferpayKeyValueInterface
     */
    protected $initData;

    /**
     * @var SaferpayKeyValueInterface
     */
    protected $confirmData;

    /**
     * @var SaferpayKeyValueInterface
     */
    protected $completeData;

    /**
     * @var SaferpayKeyValueInterface
     */
    protected $keyValuePrototype;

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
     * @param SaferpayKeyValueInterface $data
     * @return self
     */
    public function setInitData(SaferpayKeyValueInterface $data)
    {
        $this->initData = $data;
        return $this;
    }

    /**
     * @return SaferpayKeyValueInterface
     */
    public function getInitData()
    {
        if(is_null($this->initData))
        {
            $this->initData = $this->getKeyValuePrototype();
        }
        return $this->initData;
    }

    /**
     * @param SaferpayKeyValueInterface $data
     * @return self
     */
    public function setConfirmData(SaferpayKeyValueInterface $data)
    {
        $this->confirmData = $data;
        return $this;
    }

    /**
     * @return SaferpayKeyValueInterface
     */
    public function getConfirmData()
    {
        if(is_null($this->confirmData))
        {
            $this->confirmData = $this->getKeyValuePrototype();
        }
        return $this->confirmData;
    }

    /**
     * @param SaferpayKeyValueInterface $data
     * @return self
     */
    public function setCompleteData(SaferpayKeyValueInterface $data)
    {
        $this->completeData = $data;
        return $this;
    }

    /**
     * @return SaferpayKeyValueInterface
     */
    public function getCompleteData()
    {
        if(is_null($this->completeData))
        {
            $this->completeData = $this->getKeyValuePrototype();
        }
        return $this->completeData;
    }

    /**
     * @param SaferpayKeyValueInterface $keyValuePrototype
     * @return Saferpay
     */
    public function setKeyValuePrototype(SaferpayKeyValueInterface $keyValuePrototype)
    {
        $this->keyValuePrototype = $keyValuePrototype;
        return $this;
    }

    /**
     * @return SaferpayKeyValueInterface
     */
    public function getKeyValuePrototype()
    {
        if(is_null($this->keyValuePrototype))
        {
            $this->setKeyValuePrototype(new SaferpayKeyValue());
        }

        $keyValuePrototype = clone $this->keyValuePrototype;
        $keyValuePrototype->reset();

        return $keyValuePrototype;
    }
}