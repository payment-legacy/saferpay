<?php

namespace Payment\Saferpay\Data;

interface DataInterface
{
    /**
     * @return string
     */
    public function getRequestUrl();

    /**
     * @return array
     */
    public function getData();

    /**
     * @return array
     */
    public function getInvalidData();

    /**
     * @param string $field
     * @param mixed  $value
     * @return $this
     */
    public function set($field, $value);

    /**
     * @param $field
     * @return mixed
     */
    public function get($field);
}
