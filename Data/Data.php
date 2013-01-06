<?php

namespace Saferpay\Data;

class Data implements DataInterface
{
    /**
     * @var array
     */
    protected $data = array();

    /**
     * @var array
     */
    protected $invalidData = array();

    /**
     * @param array $data
     * @param array $invalidData
     */
    public function __construct(array $data = array(), array $invalidData = array())
    {
        foreach($data as $key => $value)
        {
            $this->addData($key, $value);
        }
        foreach($invalidData as $key => $value)
        {
            $this->addInvalidData($key, $value);
        }
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return self
     */
    public function addData($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getData($key)
    {
        return $this->hasData($key) ? $this->data[$key] : null;
    }

    /**
     * @param string $key
     * @return boolean
     */
    public function hasData($key)
    {
        return array_key_exists($key, $this->data);
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return self
     */
    public function addInvalidData($key, $value)
    {
        $this->invalidData[$key] = $value;
        return $this;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getInvalidData($key)
    {
        return $this->hasInvalidData($key) ? $this->invalidData[$key] : null;
    }

    /**
     * @param string $key
     * @return boolean
     */
    public function hasInvalidData($key)
    {
        return array_key_exists($key, $this->invalidData);
    }
}