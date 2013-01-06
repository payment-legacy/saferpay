<?php

namespace Saferpay\Config;

class UrlConfig implements UrlConfigInterface
{
    /**
     * @var string
     */
    protected $base;

    /**
     * @var array
     */
    protected $routes;

    /**
     * @param null $base
     * @param array $routes
     */
    public function __construct($base = null, array $routes = array())
    {
        $this->base = $base;
        foreach($routes as $key => $value)
        {
            $this->addRoute($key, $value);
        }
    }

    /**
     * @param string $base
     * @return self
     */
    public function setBase($base)
    {
        $this->base = $base;
    }

    /**
     * @return string|null
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * @param string $key
     * @param string $value
     * @return self
     */
    public function addRoute($key, $value)
    {
        $this->routes[$key] = $value;
    }

    /**
     * @param string $key
     * @return string|null
     */
    public function getRoute($key)
    {
        return $this->hasRoute($key) ? $this->routes[$key]: null;
    }

    /**
     * @param string $key
     * @return boolean
     */
    public function hasRoute($key)
    {
        return array_key_exists($key, $this->routes);
    }

}