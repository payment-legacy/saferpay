<?php

namespace Payment\Saferpay\Data\Collection;

use Payment\Saferpay\SaferpayConditionConverter;

abstract class AbstractCollectionItem implements CollectionItemInterface
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
    protected $data;

    /**
     * @var array
     */
    protected $invalidData;

    public function __construct()
    {
        $this->data = array();
        $this->invalidData = array();
    }

    public function disableCheckCondition()
    {
        $this->checkCondition = false;
    }

    /**
     * @param string $fieldName
     * @param mixed  $fieldValue
     * @return $this
     */
    public function set($fieldName, $fieldValue)
    {
        if ($this->validateValue($fieldName, $fieldValue)) {
            $this->data[$fieldName] = $fieldValue;
        } else {
            $this->invalidData[$fieldName] = $fieldValue;
        }

        return $this;
    }

    /**
     * @param  string $fieldName
     * @return mixed
     */
    public function get($fieldName)
    {
        return array_key_exists($fieldName, $this->data) ? $this->data[$fieldName] : null;
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
     * @return string
     */
    public function getRequestUrl()
    {
        return $this->getReflectionClass()->hasConstant('REQUEST_URL') ? $this->getReflectionClass()->getConstant('REQUEST_URL') : '';
    }

    /**
     * @param $fieldName
     * @param $fieldValue
     * @return bool
     * @throws \InvalidArgumentException
     */
    protected function validateValue($fieldName, $fieldValue)
    {
        if (!is_scalar($fieldValue)) {
            throw new \InvalidArgumentException('A value for field ' . $fieldName . ' has to be a scalar!');
        }

        if (!$this->checkCondition) {
            return true;
        }

        if($this->getReflectionClass()->hasConstant($fieldName) &&
            preg_match(SaferpayConditionConverter::toRegex($this->getReflectionClass()->getConstant($fieldName)), $fieldValue) === 1)
        {
            return true;
        }

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
