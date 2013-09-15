<?php

namespace Payment\Saferpay\Data;

use Payment\Saferpay\SaferpayConditionConverter;

abstract class AbstractGetSet
{
    /**
     * @var KeyValueBag
     */
    protected $keyValueBag;

    /**
     * @param KeyValueBag $valueBag
     */
    public function setValueBag(KeyValueBag $valueBag)
    {
        $this->keyValueBag = $valueBag;
    }

    protected function registerValidationKeys()
    {
        $reflectionClass = new \ReflectionClass($this);
        foreach ($reflectionClass->getConstants() as $constName => $constValue) {
            if (SaferpayConditionConverter::isCondition($constValue)) {
                $this->keyValueBag->addValidationKey($constName, $constValue);
            }
        }
    }

    /**
     * @param string $offset
     * @param string $value
     */
    protected function set($offset, $value)
    {
        $this->keyValueBag[$offset] = $value;
    }

    /**
     * @param $offset
     * @return mixed
     */
    protected function get($offset)
    {
        return $this->keyValueBag[$offset];
    }
}
