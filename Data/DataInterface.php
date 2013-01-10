<?php

namespace Payment\Saferpay\Data;

interface DataInterface
{
    /**
     * @param array $data
     * @param array $invalidData
     */
    public function __construct(array $data = array(), array $invalidData = array());

    /**
     * @param string $key
     * @param mixed $value
     * @return self
     */
    public function addData($key, $value);

    /**
     * @param string $key
     * @return mixed
     */
    public function getData($key);

    /**
     * @param string $key
     * @return boolean
     */
    public function hasData($key);

    /**
     * @param string $key
     * @param mixed $value
     * @return self
     */
    public function addInvalidData($key, $value);

    /**
     * @param string $key
     * @return mixed
     */
    public function getInvalidData($key);

    /**
     * @param string $key
     * @return boolean
     */
    public function hasInvalidData($key);
}