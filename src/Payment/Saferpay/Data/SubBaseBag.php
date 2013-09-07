<?php

namespace Payment\Saferpay\Data;

class SubBaseBag
{
    /**
     * @var object
     */
    protected $object;

    /**
     * @var \ReflectionClass
     */
    protected $reflection;

    public function __construct(SubBaseInterface $subClassObject)
    {
        $this->object = $subClassObject;
        $this->reflection = new \ReflectionClass($this->object);
    }

    /**
     * @return object
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @return \ReflectionClass
     */
    public function getReflection()
    {
        return $this->reflection;
    }
}