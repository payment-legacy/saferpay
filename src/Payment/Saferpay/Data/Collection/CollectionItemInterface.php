<?php

namespace Payment\Saferpay\Data\Collection;

interface CollectionItemInterface
{
    /**
     * @param string $fieldName
     * @param mixed  $fieldValue
     * @return $this
     */
    public function set($fieldName, $fieldValue);

    /**
     * @param  string $fieldName
     * @return mixed
     */
    public function get($fieldName);

    /**
     * @return array
     */
    public function getData();

    /**
     * @return mixed
     */
    public function getInvalidData();

    /**
     * @return string
     */
    public function getRequestUrl();

    /**
     * @return array
     */
    public function getFieldNames();

    /**
     * @return string
     */
    public function getName();
}
