<?php

namespace Saferpay\Config;

class DefaultConfig implements DefaultConfigInterface
{
    /**
     * @var array
     */
    protected $defaults;

    /**
     * @param array $defaults
     */
    public function __construct(array $defaults = array())
    {
        foreach($defaults as $key => $value)
        {
            $this->addDefault($key, $value);
        }
    }

    /**
     * @param string $key
     * @param string $value
     * @return self
     */
    public function addDefault($key, $value)
    {
        $this->defaults[$key] = $value;
    }

    /**
     * @param string $key
     * @return string|null
     */
    public function getDefault($key)
    {
        return $this->hasDefault($key) ? $this->defaults[$key]: null;
    }

    /**
     * @param string $key
     * @return boolean
     */
    public function hasDefault($key)
    {
        return array_key_exists($key, $this->defaults);
    }

    /**
     * @return array
     */
    public function getDefaults()
    {
        return $this->defaults;
    }
}