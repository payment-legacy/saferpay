<?php

namespace Saferpay;

class ValidationConfigCollection implements ValidationConfigCollectionInterface
{
    /**
     * @var array
     */
    protected $validationConfigs = array();

    /**
     * @param $key
     * @param ValidationConfigInterface $validationConfig
     * @return self
     */
    public function addValidatorConfig($key, ValidationConfigInterface $validationConfig)
    {
        $this->validationConfigs[$key] = $validationConfig;
        return $this;
    }


    /**
     * @param string $key
     * @return string|null
     */
    public function getValidatorConfig($key)
    {
        return $this->hasValidatorConfig($key) ? $this->validationConfigs[$key] : null;
    }

    /**
     * @param string $key
     * @return boolean
     */
    public function hasValidatorConfig($key)
    {
        return array_key_exists($key, $this->validationConfigs);
    }
}