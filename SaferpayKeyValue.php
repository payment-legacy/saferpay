<?php

namespace Payment\Saferpay;

class SaferpayKeyValue implements SaferpayKeyValueInterface
{
    /**
     * @var int
     */
    protected $iterator;

    /**
     * @var int
     */
    protected $length;

    /**
     * @var array
     */
    protected $keys;

    /**
     * @var array
     */
    protected $keyvalues;

    public function __construct()
    {
        $this->reset();
    }

    /**
     * @return self
     */
    public function reset()
    {
        $this->iterator = 0;
        $this->length = 0;
        $this->keys = array();
        $this->keyvalues = array();
        return $this;
    }

    /**
     * @param string $key
     * @param scalar $value
     * @return self
     * @throws \InvalidArgumentException
     */
    public function set($key, $value)
    {
        $this->checkKeyType($key);
        $this->checkValueType($value);
        $this->length++;
        $this->keys[] = $key;
        $this->keyvalues[$key] = $value;
        return $this;
    }

    /**
     * @param string $key
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function has($key)
    {
        $this->checkKeyType($key);
        return array_key_exists($key, $this->keyvalues) ? true : false;
    }

    /**
     * @param string $key
     * @return scalar
     * @throws \InvalidArgumentException
     */
    public function get($key)
    {
        $this->checkKeyExists($key);
        return $this->keyvalues[$key];
    }

    protected function checkKeyType($key)
    {
        if(!is_string($key))
        {
            throw new \InvalidArgumentException("Only strings are allowed as key, " . gettype($key) . " given!");
        }
    }

    protected function checkValueType($value)
    {
        if(!is_scalar($value))
        {
            throw new \InvalidArgumentException("Only scalar (integer, float, string or boolean) are allowed as value " . gettype($value) . " given!");
        }
    }

    protected function checkKeyExists($key)
    {
        if(!$this->has($key))
        {
            throw new \InvalidArgumentException("Unknown key given: {$key}!");
        }
    }

    /**
     * @param array $array
     * @return self
     */
    public function all(array $array)
    {
        foreach($array as $key => $value)
        {
            $this->set($key, $value);
        }
        return $this;
    }

    /**
     * @return null|scalar
     */
    public function current()
    {
        return $this->valid() ? $this->get($this->key()) : null;
    }

    /**
     * @return null|scalar
     */
    public function key()
    {
        return array_key_exists($this->iterator, $this->keys) ? $this->keys[$this->iterator] : null;
    }

    public function next()
    {
        if($this->iterator == $this->length)
        {
            $this->rewind();
        }
        else
        {
            $this->iterator++;
        }
    }

    public function rewind()
    {
        $this->iterator = 0;
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return !is_null($this->key()) ? true : false;
    }
}