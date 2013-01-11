<?php

namespace Payment\Saferpay;

class SaferpayAttribute implements SaferpayAttributeInterface
{
    /**
     * @var \stdClass
     */
    protected $properties;

    /**
     * @param array $array
     */
    public function __construct(array $array = array())
    {
        $this->properties = new \stdClass();
        foreach($array as $key => $value)
        {
            $this->offsetSet($key, $value);
        }
    }

    /**
     * @param string $offset
     * @param scalar $value
     * @throws \ErrorException
     */
    public function __set($offset, $value)
    {
        throw new \ErrorException("You can't access directly!");
    }

    /**
     * @param string $offset
     * @throws \ErrorException
     */
    public function __get($offset)
    {
        throw new \ErrorException("You can't access directly!");
    }

    /**
     * @param string $offset
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function offsetExists($offset)
    {
        if(!is_string($offset))
        {
            throw new \InvalidArgumentException("Only strings are allowed as offset!");
        }
        return property_exists($this->properties, $offset) ? true : false;
    }

    /**
     * @param string $offset
     * @return scalar
     * @throws \InvalidArgumentException
     */
    public function offsetGet($offset)
    {
        if(!is_string($offset))
        {
            throw new \InvalidArgumentException("Only strings are allowed as offset!");
        }
        if(!property_exists($this->properties, $offset))
        {
            throw new \InvalidArgumentException("Unknown offset given!");
        }
        return $this->properties->{$offset};
    }

    /**
     * @param string $offset
     * @param scalar $value
     * @return self
     * @throws \InvalidArgumentException
     */
    public function offsetSet($offset, $value)
    {
        if(!is_string($offset))
        {
            throw new \InvalidArgumentException("Only strings are allowed as offset!");
        }
        if(!is_scalar($value))
        {
            throw new \InvalidArgumentException("Only scalar (integer, float, string or boolean) are allowed as value!");
        }
        $this->properties->{$offset} = $value;
        return $this;
    }

    /**
     * @param string $offset
     * @return self
     * @throws \InvalidArgumentException
     */
    public function offsetUnset($offset)
    {
        if(!is_string($offset))
        {
            throw new \InvalidArgumentException("Only strings are allowed as offset!");
        }
        if(!property_exists($this->properties, $offset))
        {
            throw new \InvalidArgumentException("Unknown offset given!");
        }
        unset($this->properties->{$offset});
        return $this;
    }

    /**
     * @return \Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->properties);
    }
}