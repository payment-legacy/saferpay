<?php

namespace Saferpay\Config;

interface DefaultConfigInterface
{
    /**
     * @param array $defaults
     */
    public function __construct(array $defaults = array());

    /**
     * @param string $key
     * @param string $value
     * @return self
     */
    public function addDefault($key, $value);

    /**
     * @param string $key
     * @return string|null
     */
    public function getDefault($key);

    /**
     * @param string $key
     * @return boolean
     */
    public function hasDefault($key);
}