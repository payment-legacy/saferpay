<?php

namespace Payment\Saferpay;

interface SaferpayKeyValueInterface extends \IteratorAggregate
{
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
     * @return self
     * @throws \InvalidArgumentException
     */
    public function offsetSet($offset, $value);

    /**
     * @param string $offset
     * @return self
     * @throws \InvalidArgumentException
     */
    public function offsetUnset($offset);
}