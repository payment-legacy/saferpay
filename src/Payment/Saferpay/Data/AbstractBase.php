<?php

namespace Payment\Saferpay\Data;

abstract class AbstractBase extends AbstractGetSet
{
    /**
     * @var SubBaseBag[]
     */
    protected $subObjectBags;

    public function __construct()
    {
        $this->keyValueBag = new KeyValueBag();
        $this->subObjectBags = array();
        $this->registerValidationKeys();
    }

    /**
     * @param SubBaseInterface $subBase
     * @return $this
     */
    public function addSubObject(SubBaseInterface $subBase)
    {
        $subBase->setValueBag($this->keyValueBag);
        $this->subObjectBags[] = new SubBaseBag($subBase);

        return $this;
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     * @throws \ErrorException
     */
    public function __call($name, $arguments)
    {
        foreach($this->subObjectBags as $subObjectBag) {
            if($subObjectBag->getReflection()->hasMethod($name)) {
                $methodReflection = $subObjectBag->getReflection()->getMethod($name);
                if($methodReflection->isPublic()) {
                    return $methodReflection->invokeArgs($subObjectBag->getObject(), $arguments);
                } else {
                    throw new \ErrorException("Method {$name} is not public on {$subObjectBag->getReflection()->getName()}");
                }

            }
        }
        throw new \ErrorException("Method {$name} not found!");
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->keyValueBag->getData();
    }

    /**
     * @return array
     */
    public function getInvalidData()
    {
        return $this->keyValueBag->getInvalidData();
    }
}