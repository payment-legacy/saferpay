<?php

namespace Payment\Saferpay\Data;

use Payment\Saferpay\SaferpayConditionConverter;

abstract class AbstractData
{
    /**
     * @var bool
     */
    protected $checkCondition = true;

    /**
     * @var \ReflectionClass
     */
    protected $reflectionClass;

    /**
     * @var array
     */
    protected $data = array();

    /**
     * @var array
     */
    protected $invalidData = array();

    public function disableCheckCondition()
    {
        $this->checkCondition = false;
    }

    /**
     * @return string
     */
    public function getRequestUrl()
    {
        return $this->getReflectionClass()->getConstant('REQUEST_URL');
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

    /**
     * @param string $field
     * @param mixed  $value
     * @return $this
     */
    public function set($field, $value)
    {
        if ($this->validateValue($field, $value)) {
            $this->data[$field] = $value;
        }

        return $this;
    }

    /**
     * @param $field
     * @return mixed
     */
    public function get($field)
    {
        return isset($this->data[$field]) ? $this->data[$field] : null;
    }

    /**
     * @param $field
     * @param $value
     * @return bool
     * @throws \InvalidArgumentException
     */
    protected function validateValue($field, $value)
    {
        if (!is_scalar($value)) {
            throw new \InvalidArgumentException('A value for field ' . $field . ' has to be a scalar!');
        }

        if (!$this->checkCondition) {
            return true;
        }

        if($this->getReflectionClass()->hasConstant($field) &&
           preg_match(SaferpayConditionConverter::toRegex($this->getReflectionClass()->getConstant($field)), $value) === 1)
        {
            return true;
        }

        $this->invalidData[$field] = $value;

        return false;
    }

    /**
     * @return \ReflectionClass
     */
    protected function getReflectionClass()
    {
        if (is_null($this->reflectionClass)) {
            $this->reflectionClass = new \ReflectionClass($this);
        }

        return $this->reflectionClass;
    }
}
