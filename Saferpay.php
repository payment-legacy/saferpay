<?php

namespace Payment\Saferpay;

use Ardent\Map as MapInterface;
use Payment\Saferpay\SaferpayConfigInterface;
use Payment\Saferpay\SaferpayDataInterface;

class Saferpay
{
    /**
     * @var SaferpayConfigInterface
     */
    protected $config;

    /**
     * @var SaferpayDataInterface
     */
    protected $data;

    public function __construct(SaferpayConfigInterface $config = null, SaferpayDataInterface $data = null)
    {
        $this->setConfig($config);
        $this->setData($data);
    }

    public function setConfig(SaferpayConfigInterface $config = null)
    {
        $this->config = $config;
    }

    public function setData(SaferpayDataInterface $data)
    {
        $this->data = $data;
    }

    public function createPayInit(array $newData = array())
    {
        $this->updateData(
            $this->config->getInitValidationConfig(),
            $this->config->getInitDefaultConfig(),
            $this->data->getInitData(),
            $newData
        );
    }

    /**
     * @param MapInterface $validator
     * @param MapInterface $default
     * @param MapInterface $data
     * @param array $newData
     */
    protected static function updateData(MapInterface $validator, MapInterface $default, MapInterface $data, array $newData)
    {
        foreach($default as $key => $value)
        {
            if(!$data->offsetExists($key))
            {
                self::setValue($validator, $data, $key, $value);
            }
        }

        foreach($newData as $key => $value)
        {
            self::setValue($validator, $data, $key, $value);
        }
    }

    /**
     * @param MapInterface $validator
     * @param MapInterface $data
     * @param string $key
     * @param mixed $value
     */
    protected static function setValue(MapInterface $validator, MapInterface $data, $key, $value)
    {
        if(self::isValidValue($validator, $key, $value))
        {
            $data->offsetSet($key, $value);
        }
        else
        {
            // todo: add to log
        }
    }

    /**
     * @param MapInterface $validator
     * @param string $key
     * @param mixed $value
     * @return boolean
     */
    public static function isValidValue(MapInterface $validator, $key, $value)
    {
        if($validator->offsetExists($key) &&
            is_scalar($value) &&
            preg_match(self::conditionToRegex($validator->offsetGet($key)), $value) == 1)
        {
            return true;
        }
        return false;
    }

    /**
     * @param string $condition
     * @return string
     */
    public static function conditionToRegex($condition)
    {
        $prepatedPattern = str_replace
        (
            array
            (
                ']',
                '[',
                '..',
                'a',
                'n',
                's'
            ),
            array
            (
                '}',
                ']{',
                '1,',
                'a-z\p{L}\ \t',
                '\d',
                '\+\-\_\:\;\/\\\<\>\(\)\.\=\?\@',
            ),
            $condition
        );

        return '/^([' . $prepatedPattern . ')$/ui' ;
    }
}