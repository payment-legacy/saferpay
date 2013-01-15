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
    public function setInitValidationsConfig(SaferpayKeyValue $validationConfig)
    {
        $this->initValidationConfig = $validationConfig;
        return $this;
    }

    /**
     * @return SaferpayKeyValue
     */
    public function getInitValidationsConfig()
    {
        return $this->initValidationConfig;
    }

    /**
     * @param SaferpayKeyValue $validationConfig
     * @return self
     */
    public function setConfirmValidationsConfig(SaferpayKeyValue $validationConfig)
    {
        $this->confirmValidationConfig = $validationConfig;
        return $this;
    }

    /**
     * @return SaferpayKeyValue
     */
    public function getConfirmValidationsConfig()
    {
        return $this->confirmValidationConfig;
    }

    /**
     * @param SaferpayKeyValue $validationConfig
     * @return self
     */
    public function setCompleteValidationsConfig(SaferpayKeyValue $validationConfig)
    {
        $this->completeValidationConfig = $validationConfig;
        return $this;
    }

    /**
     * @return SaferpayKeyValue
     */
    public function getCompleteValidationsConfig()
    {
        return $this->completeValidationConfig;
    }

    /**
     * @param SaferpayKeyValue $defaultConfig
     * @return self
     */
    public function setInitDefaultsConfig(SaferpayKeyValue $defaultConfig)
    {
        $this->initDefaultConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return SaferpayKeyValue
     */
    public function getInitDefaultsConfig()
    {
        return $this->initDefaultConfig;
    }

    /**
     * @param SaferpayKeyValue $defaultConfig
     * @return self
     */
    public function setConfirmDefaultsConfig(SaferpayKeyValue $defaultConfig)
    {
        $this->confirmDefaultConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return SaferpayKeyValue
     */
    public function getConfirmDefaultsConfig()
    {
        return $this->confirmDefaultConfig;
    }

    /**
     * @param SaferpayKeyValue $defaultConfig
     * @return self
     */
    public function setCompleteDefaultsConfig(SaferpayKeyValue $defaultConfig)
    {
        $this->completeDefaultConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return SaferpayKeyValue
     */
    public function getCompleteDefaultsConfig()
    {
        return $this->completeDefaultConfig;
    }
}