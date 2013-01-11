<?php

namespace Payment\Saferpay;

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

    /**
     * @param SaferpayConfigInterface $config
     * @return Saferpay
     */
    public function setConfig(SaferpayConfigInterface $config = null)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @return SaferpayConfigInterface
     */
    public function getConfig()
    {
        if(is_null($this->config))
        {
            // create saferpay config
            $saferpayConfig = new SaferpayConfig();

            // set the initial values
            $saferpayConfig->setInitValidationConfig(new SaferpayKeyValue());
            $saferpayConfig->setConfirmValidationConfig(new SaferpayKeyValue());
            $saferpayConfig->setCompleteValidationConfig(new SaferpayKeyValue());

            $this->setConfig($saferpayConfig);
        }

        return $this->config;
    }

    /**
     * @param SaferpayDataInterface $data
     * @return Saferpay
     */
    public function setData(SaferpayDataInterface $data = null)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return SaferpayDataInterface
     */
    public function getData()
    {
        if(is_null($this->data))
        {
            // create empty data
            $saferpayData = new SaferpayData();

            // set the initial values
            $saferpayData->setInitData(new SaferpayKeyValue());
            $saferpayData->setConfirmData(new SaferpayKeyValue());
            $saferpayData->setCompleteData(new SaferpayKeyValue());

            // set data
            $this->setData($saferpayData);
        }

        return $this->data;
    }

    public function createPayInit(SaferpayKeyValue $newData)
    {
        $this->updateData(
            $this->getConfig()->getInitValidationConfig(),
            $this->getConfig()->getInitDefaultConfig(),
            $this->getData()->getInitData(),
            $newData
        );
    }

    /**
     * @param SaferpayKeyValue $validator
     * @param SaferpayKeyValue $default
     * @param SaferpayKeyValue $data
     * @param SaferpayKeyValue $newData
     */
    protected static function updateData(SaferpayKeyValue $validator, SaferpayKeyValue $default, SaferpayKeyValue $data, SaferpayKeyValue $newData)
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
     * @param SaferpayKeyValue $validator
     * @param SaferpayKeyValue $data
     * @param string $key
     * @param mixed $value
     */
    protected static function setValue(SaferpayKeyValue $validator, SaferpayKeyValue $data, $key, $value)
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
     * @param SaferpayKeyValue $validator
     * @param string $key
     * @param mixed $value
     * @return boolean
     */
    public static function isValidValue(SaferpayKeyValue $validator, $key, $value)
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