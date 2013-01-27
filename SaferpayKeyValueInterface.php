<?php

namespace Payment\Saferpay;

interface SaferpayKeyValueInterface extends \Iterator
{
    /**
     * @return self
     */
    public function reset();

    /**
     * @param string $key
     * @param scalar $value
     * @return self
     * @throws \InvalidArgumentException
     */
    public function set($key, $value);

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
     * @return self
     * @throws \InvalidArgumentException
     */
    public function remove($key);

    /**
     * @param array $array
     * @return self
     */
    public function all(array $array);
}