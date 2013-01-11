<?php

namespace Payment\Saferpay;

interface SaferpayAttributeInterface extends \IteratorAggregate
{
    /**
     * @param array $array
     */
    public function __construct(array $array = array());

    /**
     * @param string $offset
     * @param scalar $value
     * @throws \ErrorException
     */
    public function __set($offset, $value);

    /**
     * @param string $offset
     * @throws \ErrorException
     */
    public function __get($offset);

    /**
     * @param string $offset
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function offsetExists($offset);

    /**
     * @param string $offset
     * @return scalar
     * @throws \InvalidArgumentException
     */
    public function offsetGet($offset);

    /**
     * @param string $offset
     * @param scalar $value
     * @throws \InvalidArgumentException
     */
    public function offsetSet($offset, $value);

    /**
     * @param string $offset
     * @throws \InvalidArgumentException
     */
    public function offsetUnset($offset);
}