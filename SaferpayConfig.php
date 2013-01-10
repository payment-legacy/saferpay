<?php

namespace Payment\Saferpay;

use Ardent\Map as MapInterface;

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
     * @var MapInterface
     */
    protected $initValidationConfig;

    /**
     * @var MapInterface
     */
    protected $confirmValidationConfig;

    /**
     * @var MapInterface
     */
    protected $completeValidationConfig;

    /**
     * @var MapInterface
     */
    protected $initDefaultConfig;

    /**
     * @var MapInterface
     */
    protected $confirmDefaultConfig;

    /**
     * @var MapInterface
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
     * @param MapInterface $validationConfig
     * @return self
     */
    public function setInitValidationConfig(MapInterface $validationConfig)
    {
        $this->initValidationConfig = $validationConfig;
        return $this;
    }

    /**
     * @return MapInterface
     */
    public function getInitValidationConfig()
    {
        return $this->initValidationConfig;
    }

    /**
     * @param MapInterface $validationConfig
     * @return self
     */
    public function setConfirmValidationConfig(MapInterface $validationConfig)
    {
        $this->confirmValidationConfig = $validationConfig;
        return $this;
    }

    /**
     * @return MapInterface
     */
    public function getConfirmValidationConfig()
    {
        return $this->confirmValidationConfig;
    }

    /**
     * @param MapInterface $validationConfig
     * @return self
     */
    public function setCompleteValidationConfig(MapInterface $validationConfig)
    {
        $this->completeValidationConfig = $validationConfig;
        return $this;
    }

    /**
     * @return MapInterface
     */
    public function getCompleteValidationConfig()
    {
        return $this->completeValidationConfig;
    }

    /**
     * @param MapInterface $defaultConfig
     * @return self
     */
    public function setInitDefaultConfig(MapInterface $defaultConfig)
    {
        $this->initDefaultConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return MapInterface
     */
    public function getInitDefaultConfig()
    {
        return $this->initDefaultConfig;
    }

    /**
     * @param MapInterface $defaultConfig
     * @return self
     */
    public function setConfirmDefaultConfig(MapInterface $defaultConfig)
    {
        $this->confirmDefaultConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return MapInterface
     */
    public function getConfirmDefaultConfig()
    {
        return $this->confirmDefaultConfig;
    }

    /**
     * @param MapInterface $defaultConfig
     * @return self
     */
    public function setCompleteDefaultConfig(MapInterface $defaultConfig)
    {
        $this->completeDefaultConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return MapInterface
     */
    public function getCompleteDefaultConfig()
    {
        return $this->completeDefaultConfig;
    }
}