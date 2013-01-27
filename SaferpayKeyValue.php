<?php

namespace Payment\Saferpay;

class SaferpayKeyValue implements SaferpayKeyValueInterface
{
    /**
     * @var \stdClass
     */
    protected $keyvalues;

    public function __construct()
    {
        $this->resetAll();
    }

    /**
     * @param string $key
     * @param scalar $value
     * @throws \ErrorException
     */
    public function __set($key, $value)
    {
        throw new \ErrorException("You can't access directly!");
    }

    /**
     * @param string $key
     * @throws \ErrorException
     */
    public function __get($key)
    {
        throw new \ErrorException("You can't access directly!");
    }

    /**
     * @param string $key
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function has($key)
    {
        if(!is_string($key))
        {
            throw new \InvalidArgumentException("Only strings are allowed as key, " . gettype($key) . " given!");
        }
        return property_exists($this->keyvalues, $key) ? true : false;
    }

    /**
     * @param string $key
     * @return scalar
     * @throws \InvalidArgumentException
     */
    public function get($key)
    {
        if(!is_string($key))
        {
            throw new \InvalidArgumentException("Only strings are allowed as key, " . gettype($key) . " given!");
        }
        if(!property_exists($this->keyvalues, $key))
        {
            throw new \InvalidArgumentException("Unknown key given!");
        }
        return $this->keyvalues->{$key};
    }

    /**
     * @param string $key
     * @param scalar $value
     * @return self
     * @throws \InvalidArgumentException
     */
    public function set($key, $value)
    {
        if(!is_string($key))
        {
            throw new \InvalidArgumentException("Only strings are allowed as key, " . gettype($key) . " given!");
        }
        if(!is_scalar($value))
        {
            throw new \InvalidArgumentException("Only scalar (integer, float, string or boolean) are allowed as value for key {$key}, " . gettype($value) . " given!");
        }
        $this->keyvalues->{$key} = $value;
        return $this;
    }

    /**
     * @return \Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->keyvalues);
    }

    /**
     * @param array $array
     * @return self
     */
    public function setAll(array $array)
    {
        $this->resetAll();

        foreach($array as $key => $value)
        {
            $this->set($key, $value);
        }
        return $this;
    }

    /**
     * @return self
     */
    public function resetAll()
    {
        $this->keyvalues = new \stdClass();
        return $this;
    }
}