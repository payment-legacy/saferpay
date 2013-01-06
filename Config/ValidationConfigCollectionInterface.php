<?php

namespace Saferpay\Config;

interface ValidationConfigCollectionInterface
{
    /**
     * @param $key
     * @param ValidationConfigInterface $validationConfig
     * @return self
     */
    public function addValidatorConfig($key, ValidationConfigInterface $validationConfig);

    /**
     * @param string $key
     * @return string|null
     */
    public function getValidatorConfig($key);

    /**
     * @param string $key
     * @return boolean
     */
    public function hasValidatorConfig($key);
}