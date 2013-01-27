<?php

namespace Payment\Saferpay;


class SaferpayConfig implements SaferpayConfigInterface
{
    /**
     * @var string
     */
    protected $initUrl;

    /**
     * @var string
     */
    protected $confirmUrl;

    /**
     * @var string
     */
    protected $completeUrl;

    /**
     * @var SaferpayKeyValueInterface
     */
    protected $initValidationsConfig;

    /**
     * @var SaferpayKeyValueInterface
     */
    protected $confirmValidationsConfig;

    /**
     * @var SaferpayKeyValueInterface
     */
    protected $completeValidationsConfig;

    /**
     * @var SaferpayKeyValueInterface
     */
    protected $initDefaultsConfig;

    /**
     * @var SaferpayKeyValueInterface
     */
    protected $confirmDefaultsConfig;

    /**
     * @var SaferpayKeyValueInterface
     */
    protected $completeDefaultsConfig;

    /**
     * @var SaferpayKeyValueInterface
     */
    protected $keyValuePrototype;

    /**
     * @param string $url
     * @return self
     */
    public function setInitUrl($url)
    {
        $this->initUrl = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getInitUrl()
    {
        return $this->initUrl;
    }

    /**
     * @param string $url
     * @return self
     */
    public function setConfirmUrl($url)
    {
        $this->confirmUrl = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getConfirmUrl()
    {
        return $this->confirmUrl;
    }

    /**
     * @param string $url
     * @return self
     */
    public function setCompleteUrl($url)
    {
        $this->completeUrl = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompleteUrl()
    {
        return $this->completeUrl;
    }

    /**
     * @param SaferpayKeyValueInterface $validationConfig
     * @return self
     */
    public function setInitValidationsConfig(SaferpayKeyValueInterface $validationConfig)
    {
        $this->initValidationsConfig = $validationConfig;
        return $this;
    }

    /**
     * @return SaferpayKeyValueInterface
     */
    public function getInitValidationsConfig()
    {
        if(is_null($this->initValidationsConfig))
        {
            $this->initValidationsConfig = $this->getKeyValuePrototype();
        }
        return $this->initValidationsConfig;
    }

    /**
     * @param SaferpayKeyValueInterface $validationConfig
     * @return self
     */
    public function setConfirmValidationsConfig(SaferpayKeyValueInterface $validationConfig)
    {
        $this->confirmValidationsConfig = $validationConfig;
        return $this;
    }

    /**
     * @return SaferpayKeyValueInterface
     */
    public function getConfirmValidationsConfig()
    {
        if(is_null($this->confirmValidationsConfig))
        {
            $this->confirmValidationsConfig = $this->getKeyValuePrototype();
        }
        return $this->confirmValidationsConfig;
    }

    /**
     * @param SaferpayKeyValueInterface $validationConfig
     * @return self
     */
    public function setCompleteValidationsConfig(SaferpayKeyValueInterface $validationConfig)
    {
        $this->completeValidationsConfig = $validationConfig;
        return $this;
    }

    /**
     * @return SaferpayKeyValueInterface
     */
    public function getCompleteValidationsConfig()
    {
        if(is_null($this->completeValidationsConfig))
        {
            $this->completeValidationsConfig = $this->getKeyValuePrototype();
        }
        return $this->completeValidationsConfig;
    }

    /**
     * @param SaferpayKeyValueInterface $defaultConfig
     * @return self
     */
    public function setInitDefaultsConfig(SaferpayKeyValueInterface $defaultConfig)
    {
        $this->initDefaultsConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return SaferpayKeyValueInterface
     */
    public function getInitDefaultsConfig()
    {
        if(is_null($this->initDefaultsConfig))
        {
            $this->initDefaultsConfig = $this->getKeyValuePrototype();
        }
        return $this->initDefaultsConfig;
    }

    /**
     * @param SaferpayKeyValueInterface $defaultConfig
     * @return self
     */
    public function setConfirmDefaultsConfig(SaferpayKeyValueInterface $defaultConfig)
    {
        $this->confirmDefaultsConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return SaferpayKeyValueInterface
     */
    public function getConfirmDefaultsConfig()
    {
        if(is_null($this->confirmDefaultsConfig))
        {
            $this->confirmDefaultsConfig = $this->getKeyValuePrototype();
        }
        return $this->confirmDefaultsConfig;
    }

    /**
     * @param SaferpayKeyValueInterface $defaultConfig
     * @return self
     */
    public function setCompleteDefaultsConfig(SaferpayKeyValueInterface $defaultConfig)
    {
        $this->completeDefaultsConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return SaferpayKeyValueInterface
     */
    public function getCompleteDefaultsConfig()
    {
        if(is_null($this->completeDefaultsConfig))
        {
            $this->completeDefaultsConfig = $this->getKeyValuePrototype();
        }
        return $this->completeDefaultsConfig;
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
        $keyValuePrototype->resetAll();

        return $keyValuePrototype;
    }
}