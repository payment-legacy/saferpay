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
     * @var \ArrayAccess
     */
    protected $initValidationConfig;

    /**
     * @var \ArrayAccess
     */
    protected $confirmValidationConfig;

    /**
     * @var \ArrayAccess
     */
    protected $completeValidationConfig;

    /**
     * @var \ArrayAccess
     */
    protected $initDefaultConfig;

    /**
     * @var \ArrayAccess
     */
    protected $confirmDefaultConfig;

    /**
     * @var \ArrayAccess
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
     * @param \ArrayAccess $validationConfig
     * @return self
     */
    public function setInitValidationConfig(\ArrayAccess $validationConfig)
    {
        $this->initValidationConfig = $validationConfig;
        return $this;
    }

    /**
     * @return \ArrayAccess
     */
    public function getInitValidationConfig()
    {
        return $this->initValidationConfig;
    }

    /**
     * @param \ArrayAccess $validationConfig
     * @return self
     */
    public function setConfirmValidationConfig(\ArrayAccess $validationConfig)
    {
        $this->confirmValidationConfig = $validationConfig;
        return $this;
    }

    /**
     * @return \ArrayAccess
     */
    public function getConfirmValidationConfig()
    {
        return $this->confirmValidationConfig;
    }

    /**
     * @param \ArrayAccess $validationConfig
     * @return self
     */
    public function setCompleteValidationConfig(\ArrayAccess $validationConfig)
    {
        $this->completeValidationConfig = $validationConfig;
        return $this;
    }

    /**
     * @return \ArrayAccess
     */
    public function getCompleteValidationConfig()
    {
        return $this->completeValidationConfig;
    }

    /**
     * @param \ArrayAccess $defaultConfig
     * @return self
     */
    public function setInitDefaultConfig(\ArrayAccess $defaultConfig)
    {
        $this->initDefaultConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return \ArrayAccess
     */
    public function getInitDefaultConfig()
    {
        return $this->initDefaultConfig;
    }

    /**
     * @param \ArrayAccess $defaultConfig
     * @return self
     */
    public function setConfirmDefaultConfig(\ArrayAccess $defaultConfig)
    {
        $this->confirmDefaultConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return \ArrayAccess
     */
    public function getConfirmDefaultConfig()
    {
        return $this->confirmDefaultConfig;
    }

    /**
     * @param \ArrayAccess $defaultConfig
     * @return self
     */
    public function setCompleteDefaultConfig(\ArrayAccess $defaultConfig)
    {
        $this->completeDefaultConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return \ArrayAccess
     */
    public function getCompleteDefaultConfig()
    {
        return $this->completeDefaultConfig;
    }
}