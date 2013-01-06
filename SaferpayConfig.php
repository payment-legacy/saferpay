<?php

namespace Saferpay;

class SaferpayConfig implements SaferpayConfigInterface
{
    /**
     * @var UrlConfigInterface
     */
    protected $urlConfig;

    /**
     * @var ValidationConfigCollectionInterface
     */
    protected $validationConfigCollection = array();

    /**
     * @var DefaultConfigInterface
     */
    protected $defaultConfig;

    /**
     * @param UrlConfigInterface $urlConfig
     * @return self
     */
    public function setUrlConfig(UrlConfigInterface $urlConfig)
    {
        $this->urlConfig = $urlConfig;
        return $this;
    }

    /**
     * @return UrlConfigInterface
     */
    public function getUrlConfig()
    {
        return $this->urlConfig;
    }

    /**
     * @param ValidationConfigCollectionInterface $validationConfigCollection
     * @return self
     */
    public function setValidationConfigCollection(ValidationConfigCollectionInterface $validationConfigCollection)
    {
        $this->validationConfigCollection = $validationConfigCollection;
        return $this;
    }

    /**
     * @return ValidationConfigCollectionInterface
     */
    public function getValidationConfigCollection()
    {
        return $this->validationConfigCollection;
    }

    /**
     * @param DefaultConfigInterface $defaultConfig
     * @return self
     */
    public function setDefaultConfig(DefaultConfigInterface $defaultConfig)
    {
        $this->defaultConfig = $defaultConfig;
        return $this;
    }

    /**
     * @return DefaultConfigInterface
     */
    public function getDefaultConfig()
    {
        return $this->defaultConfig;
    }
}