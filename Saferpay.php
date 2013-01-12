<?php

namespace Payment\Saferpay;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

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
     * @var LoggerInterface
     */
    protected $logger;

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

    /**
     * @param LoggerInterface $logger
     * @return Saferpay
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger;
        return $this;
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger()
    {
        if(is_null($this->logger))
        {
            // create null logger
            $this->logger = new NullLogger();
        }

        return $this->logger;
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
    protected function updateData(SaferpayKeyValue $validator, SaferpayKeyValue $default, SaferpayKeyValue $data, SaferpayKeyValue $newData)
    {
        foreach($default as $key => $value)
        {
            // do no overwrite data with defaults
            if(!$data->offsetExists($key))
            {
                $this->setValue($validator, $data, $key, $value);
            }
        }

        foreach($newData as $key => $value)
        {
            $this->setValue($validator, $data, $key, $value);
        }
    }

    /**
     * @param SaferpayKeyValue $validator
     * @param SaferpayKeyValue $data
     * @param string $key
     * @param scalar $value
     */
    protected function setValue(SaferpayKeyValue $validator, SaferpayKeyValue $data, $key, $value)
    {
        if(!$validator->offsetExists($key))
        {
            $this->getLogger()->warning("saferpay: Can't find validator for key {key}", array('key' => $key));
            return;
        }

        if(!self::isValidValue($validator->offsetGet($key), $value))
        {
            $this->getLogger()->warning("saferpay: Can't validate value {value} for key {key} against validator {validator}", array(
                'validator' => $validator->offsetGet($key),
                'key' => $key,
                'value' => $value,
            ));
            return;
        }

        $data->offsetSet($key, $value);
    }

    /**
     * @param string $condition
     * @param scalar $value
     * @return boolean
     */
    public static function isValidValue($condition, $value)
    {
        if(is_string($condition) &&
           is_scalar($value) &&
           preg_match(self::conditionToRegex($condition), $value) == 1)
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