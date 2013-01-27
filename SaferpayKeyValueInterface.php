<?php

namespace Payment\Saferpay;

interface SaferpayKeyValueInterface extends \IteratorAggregate
{
    /**
     * @param string $key
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function has($key);

    /**
     * @param string $key
     * @return scalar
     * @throws \InvalidArgumentException
     */
    public function get($key);

    /**
     * @param string $key
     * @param scalar $value
     * @return self
     * @throws \InvalidArgumentException
     */
    public function set($key, $value);

    /**
     * @param array $array
     * @return self
     */
    public function setAll(array $array);

    /**
     * @return self
     */
    public function resetAll();
}