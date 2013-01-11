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
     * @var SaferpayAttribute
     */
    protected $initValidationConfig;

    /**
     * @var SaferpayAttribute
     */
    protected $confirmValidationConfig;

    /**
     * @var SaferpayAttribute
     */
    protected $completeValidationConfig;

    /**
     * @var SaferpayAttribute
     */
    protected $initDefaultConfig;

    /**
     * @var SaferpayAttribute
     */
    protected $confirmDefaultConfig;

    /**
     * @var SaferpayAttribute
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
     * @param SaferpayAttribute $validationConfig
     * @return self
     */
    public function setInitValidationConfig(SaferpayAttribute $validationConfig)
    {
        $this->initValidationConfig = $validationConfig;
        return $this;
    }

    /**
     * @return SaferpayAttribute
     */
    public function getInitValidationConfig()
    {
        return $this->initValidationConfig;
    }

    /**
     * @param SaferpayAttribute $validationConfig
     * @return self
     */
    public function setConfirmValidationConfig(SaferpayAttribute $validationConfig)
    {
        $this->confirmValidationConfig = $validationConfig;
        return $this;
    }

    /**
     * @return SaferpayAttribute
     */
    public function getConfirmValidationConfig()
    {
        return $this->confirmValidationConfig;
    }

    /**
     * @param SaferpayAttribute $validationConfig
     * @return self
     */
    public function setCompleteValidationConfig(SaferpayAttribute $validationConfig)
    {
        $this->completeValidationConfig = $validationConfig;
        return $this;
    }

    /**
     * @return SaferpayAttribute
     */
    public function getCompleteValidationConfig()
    {
        return $this->completeValidationConfig;
    }

    /**
     * @param SaferpayAttribute $defaultConfig
     * @return self
     */
    public function setInitDefaultConfig(SaferpayAttribute $defaultConfig)
    {
        $this->initDefaultConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return SaferpayAttribute
     */
    public function getInitDefaultConfig()
    {
        return $this->initDefaultConfig;
    }

    /**
     * @param SaferpayAttribute $defaultConfig
     * @return self
     */
    public function setConfirmDefaultConfig(SaferpayAttribute $defaultConfig)
    {
        $this->confirmDefaultConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return SaferpayAttribute
     */
    public function getConfirmDefaultConfig()
    {
        return $this->confirmDefaultConfig;
    }

    /**
     * @param SaferpayAttribute $defaultConfig
     * @return self
     */
    public function setCompleteDefaultConfig(SaferpayAttribute $defaultConfig)
    {
        $this->completeDefaultConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return SaferpayAttribute
     */
    public function getCompleteDefaultConfig()
    {
        return $this->completeDefaultConfig;
    }
}