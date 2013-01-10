<?php

namespace Payment\Saferpay\Config;

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
     * @var ValidationConfigInterface
     */
    protected $initValidationConfig;

    /**
     * @var ValidationConfigInterface
     */
    protected $confirmValidationConfig;

    /**
     * @var ValidationConfigInterface
     */
    protected $completeValidationConfig;

    /**
     * @var DefaultConfigInterface
     */
    protected $initDefaultConfig;

    /**
     * @var DefaultConfigInterface
     */
    protected $confirmDefaultConfig;

    /**
     * @var DefaultConfigInterface
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
     * @param ValidationConfigInterface $validationConfig
     * @return self
     */
    public function setInitValidationConfig(ValidationConfigInterface $validationConfig)
    {
        $this->initValidationConfig = $validationConfig;
        return $this;
    }

    /**
     * @return ValidationConfigInterface
     */
    public function getInitValidationConfig()
    {
        return $this->initValidationConfig;
    }

    /**
     * @param ValidationConfigInterface $validationConfig
     * @return self
     */
    public function setConfirmValidationConfig(ValidationConfigInterface $validationConfig)
    {
        $this->confirmValidationConfig = $validationConfig;
        return $this;
    }

    /**
     * @return ValidationConfigInterface
     */
    public function getConfirmValidationConfig()
    {
        return $this->confirmValidationConfig;
    }

    /**
     * @param ValidationConfigInterface $validationConfig
     * @return self
     */
    public function setCompleteValidationConfig(ValidationConfigInterface $validationConfig)
    {
        $this->completeValidationConfig = $validationConfig;
        return $this;
    }

    /**
     * @return ValidationConfigInterface
     */
    public function getCompleteValidationConfig()
    {
        return $this->completeValidationConfig;
    }

    /**
     * @param DefaultConfigInterface $defaultConfig
     * @return self
     */
    public function setInitDefaultConfig(DefaultConfigInterface $defaultConfig)
    {
        $this->initDefaultConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return ValidationConfigInterface
     */
    public function getInitDefaultConfig()
    {
        return $this->initDefaultConfig;
    }

    /**
     * @param DefaultConfigInterface $defaultConfig
     * @return self
     */
    public function setConfirmDefaultConfig(DefaultConfigInterface $defaultConfig)
    {
        $this->confirmDefaultConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return ValidationConfigInterface
     */
    public function getConfirmDefaultConfig()
    {
        return $this->confirmDefaultConfig;
    }

    /**
     * @param DefaultConfigInterface $defaultConfig
     * @return self
     */
    public function setCompleteDefaultConfig(DefaultConfigInterface $defaultConfig)
    {
        $this->completeDefaultConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return ValidationConfigInterface
     */
    public function getCompleteDefaultConfig()
    {
        return $this->completeDefaultConfig;
    }
}