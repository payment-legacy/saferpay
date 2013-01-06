<?php

namespace Saferpay;

interface ValidationConfigInterface
{
    /**
     * @param array $config
     */
    public function __construct(array $config = array());

    /**
     * @param string $key
     * @param string $value
     * @return self
     */
    public function addValidator($key, $value);

    /**
     * @param string $key
     * @return string|null
     */
    public function getValidator($key);

    /**
     * @param string $key
     * @return boolean
     */
    public function hasValidator($key);
}