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
     * @var SaferpayKeyValue
     */
    protected $initValidationConfig;

    /**
     * @var SaferpayKeyValue
     */
    protected $confirmValidationConfig;

    /**
     * @var SaferpayKeyValue
     */
    protected $completeValidationConfig;

    /**
     * @var SaferpayKeyValue
     */
    protected $initDefaultConfig;

    /**
     * @var SaferpayKeyValue
     */
    protected $confirmDefaultConfig;

    /**
     * @var SaferpayKeyValue
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
     * @param SaferpayKeyValue $validationConfig
     * @return self
     */
    public function setInitValidationConfig(SaferpayKeyValue $validationConfig)
    {
        $this->initValidationConfig = $validationConfig;
        return $this;
    }

    /**
     * @return SaferpayKeyValue
     */
    public function getInitValidationConfig()
    {
        return $this->initValidationConfig;
    }

    /**
     * @param SaferpayKeyValue $validationConfig
     * @return self
     */
    public function setConfirmValidationConfig(SaferpayKeyValue $validationConfig)
    {
        $this->confirmValidationConfig = $validationConfig;
        return $this;
    }

    /**
     * @return SaferpayKeyValue
     */
    public function getConfirmValidationConfig()
    {
        return $this->confirmValidationConfig;
    }

    /**
     * @param SaferpayKeyValue $validationConfig
     * @return self
     */
    public function setCompleteValidationConfig(SaferpayKeyValue $validationConfig)
    {
        $this->completeValidationConfig = $validationConfig;
        return $this;
    }

    /**
     * @return SaferpayKeyValue
     */
    public function getCompleteValidationConfig()
    {
        return $this->completeValidationConfig;
    }

    /**
     * @param SaferpayKeyValue $defaultConfig
     * @return self
     */
    public function setInitDefaultConfig(SaferpayKeyValue $defaultConfig)
    {
        $this->initDefaultConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return SaferpayKeyValue
     */
    public function getInitDefaultConfig()
    {
        return $this->initDefaultConfig;
    }

    /**
     * @param SaferpayKeyValue $defaultConfig
     * @return self
     */
    public function setConfirmDefaultConfig(SaferpayKeyValue $defaultConfig)
    {
        $this->confirmDefaultConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return SaferpayKeyValue
     */
    public function getConfirmDefaultConfig()
    {
        return $this->confirmDefaultConfig;
    }

    /**
     * @param SaferpayKeyValue $defaultConfig
     * @return self
     */
    public function setCompleteDefaultConfig(SaferpayKeyValue $defaultConfig)
    {
        $this->completeDefaultConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return SaferpayKeyValue
     */
    public function getCompleteDefaultConfig()
    {
        return $this->completeDefaultConfig;
    }
}