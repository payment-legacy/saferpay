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
     * @var \ArrayObject
     */
    protected $initValidationConfig;

    /**
     * @var \ArrayObject
     */
    protected $confirmValidationConfig;

    /**
     * @var \ArrayObject
     */
    protected $completeValidationConfig;

    /**
     * @var \ArrayObject
     */
    protected $initDefaultConfig;

    /**
     * @var \ArrayObject
     */
    protected $confirmDefaultConfig;

    /**
     * @var \ArrayObject
     */
    protected $completeDefaultConfig;

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
     * @param \ArrayObject $validationConfig
     * @return self
     */
    public function setInitValidationConfig(\ArrayObject $validationConfig)
    {
        $this->initValidationConfig = $validationConfig;
        return $this;
    }

    /**
     * @return \ArrayObject
     */
    public function getInitValidationConfig()
    {
        return $this->initValidationConfig;
    }

    /**
     * @param \ArrayObject $validationConfig
     * @return self
     */
    public function setConfirmValidationConfig(\ArrayObject $validationConfig)
    {
        $this->confirmValidationConfig = $validationConfig;
        return $this;
    }

    /**
     * @return \ArrayObject
     */
    public function getConfirmValidationConfig()
    {
        return $this->confirmValidationConfig;
    }

    /**
     * @param \ArrayObject $validationConfig
     * @return self
     */
    public function setCompleteValidationConfig(\ArrayObject $validationConfig)
    {
        $this->completeValidationConfig = $validationConfig;
        return $this;
    }

    /**
     * @return \ArrayObject
     */
    public function getCompleteValidationConfig()
    {
        return $this->completeValidationConfig;
    }

    /**
     * @param \ArrayObject $defaultConfig
     * @return self
     */
    public function setInitDefaultConfig(\ArrayObject $defaultConfig)
    {
        $this->initDefaultConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return \ArrayObject
     */
    public function getInitDefaultConfig()
    {
        return $this->initDefaultConfig;
    }

    /**
     * @param \ArrayObject $defaultConfig
     * @return self
     */
    public function setConfirmDefaultConfig(\ArrayObject $defaultConfig)
    {
        $this->confirmDefaultConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return \ArrayObject
     */
    public function getConfirmDefaultConfig()
    {
        return $this->confirmDefaultConfig;
    }

    /**
     * @param \ArrayObject $defaultConfig
     * @return self
     */
    public function setCompleteDefaultConfig(\ArrayObject $defaultConfig)
    {
        $this->completeDefaultConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return \ArrayObject
     */
    public function getCompleteDefaultConfig()
    {
        return $this->completeDefaultConfig;
    }
}