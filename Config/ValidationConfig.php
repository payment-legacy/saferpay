<?php

namespace Payment\Saferpay\Config;

class ValidationConfig implements ValidationConfigInterface
{
    /**
     * @var array
     */
    protected $validators = array();

    /**
     * @param array $config
     */
    public function __construct(array $config = array())
    {
        foreach($config as $key => $value)
        {
            $this->addValidator($key, $value);
        }
    }

    /**
     * @param string $key
     * @param string $value
     * @return self
     */
    public function addValidator($key, $value)
    {
        $this->validators[$key] = $value;
        return $this;
    }

    /**
     * @param string $key
     * @return string|null
     */
    public function getValidator($key)
    {
        return $this->hasValidator($key) ? $this->validators[$key] : null;
    }

    /**
     * @param string $key
     * @return boolean
     */
    public function hasValidator($key)
    {
        return array_key_exists($key, $this->validators);
    }
}