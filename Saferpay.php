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
            $saferpayConfig->setInitValidationConfig(new SaferpayAttribute());
            $saferpayConfig->setConfirmValidationConfig(new SaferpayAttribute());
            $saferpayConfig->setCompleteValidationConfig(new SaferpayAttribute());

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
            $saferpayData->setInitData(new SaferpayAttribute());
            $saferpayData->setConfirmData(new SaferpayAttribute());
            $saferpayData->setCompleteData(new SaferpayAttribute());

            // set data
            $this->setData($saferpayData);
        }

        return $this->data;
    }

    public function createPayInit(SaferpayAttribute $newData)
    {
        $this->updateData(
            $this->getConfig()->getInitValidationConfig(),
            $this->getConfig()->getInitDefaultConfig(),
            $this->getData()->getInitData(),
            $newData
        );
    }

    /**
     * @param SaferpayAttribute $validator
     * @param SaferpayAttribute $default
     * @param SaferpayAttribute $data
     * @param SaferpayAttribute $newData
     */
    protected static function updateData(SaferpayAttribute $validator, SaferpayAttribute $default, SaferpayAttribute $data, SaferpayAttribute $newData)
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
     * @param SaferpayAttribute $validator
     * @param SaferpayAttribute $data
     * @param string $key
     * @param mixed $value
     */
    protected static function setValue(SaferpayAttribute $validator, SaferpayAttribute $data, $key, $value)
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
     * @param SaferpayAttribute $validator
     * @param string $key
     * @param mixed $value
     * @return boolean
     */
    public static function isValidValue(SaferpayAttribute $validator, $key, $value)
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