<?php

namespace Saferpay;

interface UrlConfigInterface
{
    /**
     * @param null $base
     * @param array $routes
     */
    public function __construct($base = null, array $routes = array());

    /**
     * @param string $base
     * @return self
     */
    public function setBase($base);

    /**
     * @return string|null
     */
    public function getBase();

    /**
     * @param string $key
     * @param string $value
     * @return self
     */
    public function addRoute($key, $value);

    /**
     * @param string $key
     * @return string|null
     */
    public function getRoute($key);

    /**
     * @param string $key
     * @return boolean
     */
    public function hasRoute($key);
}