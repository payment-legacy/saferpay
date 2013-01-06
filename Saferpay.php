<?php

namespace Saferpay;

use Saferpay\Config\DefaultConfigInterface;
use Saferpay\Config\SaferpayConfigInterface;
use Saferpay\Config\ValidationConfigInterface;
use Saferpay\Data\DataInterface;
use Saferpay\Data\SaferpayDataInterface;

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
     * @param Config\ValidationConfigInterface $validator
     * @param Config\DefaultConfigInterface $default
     * @param Data\DataInterface $data
     * @param array $newData
     */
    protected static function updateData(ValidationConfigInterface $validator, DefaultConfigInterface $default, DataInterface $data, array $newData)
    {
        foreach($default->getDefaults() as $key => $value)
        {
            if(!$data->hasData($key))
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
     * @param Config\ValidationConfigInterface $validator
     * @param Data\DataInterface $data
     * @param string $key
     * @param mixed $value
     */
    protected static function setValue(ValidationConfigInterface $validator, DataInterface $data, $key, $value)
    {
        if(self::isValidValue($validator, $key, $value))
        {
            $data->addData($key, $value);
        }
        else
        {
            $data->addInvalidData($key, $value);
        }
    }

    /**
     * @param Config\ValidationConfigInterface $validator
     * @param string $key
     * @param mixed $value
     * @return boolean
     */
    public static function isValidValue(ValidationConfigInterface $validator, $key, $value)
    {
        if($validator->hasValidator($key) &&
            is_scalar($value) &&
            preg_match(self::conditionToRegex($validator->getValidator($key)), $value) == 1)
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