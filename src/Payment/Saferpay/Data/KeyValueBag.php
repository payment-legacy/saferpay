<?php

namespace Payment\Saferpay\Data;

use Payment\Saferpay\SaferpayConditionConverter;

class KeyValueBag implements \ArrayAccess, \Iterator
{
    /**
     * @var array
     */
    protected $data;

    /**
     * @var array
     */
    protected $keys;

    /**
     * @var int
     */
    protected $pointer;

    /**
     * @var array
     */
    protected $invalidData;

    /**
     * @var array
     */
    protected $validKeys;

    public function __construct()
    {
        $this->data = array();
        $this->keys = array();
        $this->pointer = 0;
        $this->invalidData = array();
        $this->validKeys = array();
    }

    /**
     * @param  mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return in_array($offset, $this->keys);
    }

    /**
     * @param  mixed      $offset
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return in_array($offset, $this->keys) ? $this->data[$offset] : null;
    }

    /**
     * @param  mixed                     $offset
     * @param  mixed                     $value
     * @throws \InvalidArgumentException
     */
    public function offsetSet($offset, $value)
    {
        if (!is_scalar($value)) {
            throw new \InvalidArgumentException("Only scalar values (integer, float, string or boolean) are allowed!");
        }

        if (array_key_exists($offset, $this->validKeys)) {
            $condition = $this->validKeys[$offset];
            if (preg_match(SaferpayConditionConverter::toRegex($condition), $value) === 1) {
                $this->data[$offset] = $value;
                $this->keys = array_keys($this->data);

                return;
            }
        }

        $this->invalidData[$offset] = $value;
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        if (in_array($offset, $this->keys)) {
            unset($this->keys[array_search($offset, $this->keys)]);
            $this->keys = array_keys($this->data);
        }
    }

    /**
     * @return mixed|null
     */
    public function current()
    {
        if (array_key_exists($this->pointer, $this->keys)) {
            return $this->data[$this->keys[$this->pointer]];
        }

        return null;
    }

    public function next()
    {
        $this->pointer++;
    }

    /**
     * @return mixed|null
     */
    public function key()
    {
        if (array_key_exists($this->pointer, $this->keys)) {
            return $this->keys[$this->pointer];
        }

        return null;
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return array_key_exists($this->pointer, $this->keys);
    }

    public function rewind()
    {
        $this->pointer = 0;
    }

    /**
     * @param $offset
     * @param $condition
     * @return $this
     */
    public function addValidationKey($offset, $condition)
    {
        $this->validKeys[$offset] = $condition;

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return array
     */
    public function getInvalidData()
    {
        return $this->invalidData;
    }
}
