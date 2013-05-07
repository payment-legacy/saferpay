<?php

namespace Payment\Saferpay;

use Payment\HttpClient\HttpClientInterface;
use Payment\HttpClient\NullClient;

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
     * @var SaferpayKeyValueInterface
     */
    protected $keyValuePrototype;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var HttpClientInterface
     */
    protected $httpClient;

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
     * @return array
     */
    public static function getSaferpayConfig()
    {
        return json_decode(file_get_contents(__DIR__.'/config.json'), true);
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
            $saferpayConfig->setKeyValuePrototype($this->getKeyValuePrototype());

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
            $saferpayData->setKeyValuePrototype($this->getKeyValuePrototype());

            // set data
            $this->setData($saferpayData);
        }

        return $this->data;
    }

    /**
     * @param SaferpayKeyValueInterface $keyValuePrototype
     * @return Saferpay
     */
    public function setKeyValuePrototype(SaferpayKeyValueInterface $keyValuePrototype)
    {
        $this->keyValuePrototype = $keyValuePrototype;
        return $this;
    }

    /**
     * @return SaferpayKeyValueInterface
     */
    public function getKeyValuePrototype()
    {
        if(is_null($this->keyValuePrototype))
        {
            $this->setKeyValuePrototype(new SaferpayKeyValue());
        }

        $keyValuePrototype = clone $this->keyValuePrototype;
        $keyValuePrototype->reset();

        return $keyValuePrototype;
    }

    /**
     * @param LoggerInterface $logger
     * @return Saferpay
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
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

    /**
     * @param HttpClientInterface $httpClient
     * @return Saferpay
     */
    public function setHttpClient(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
        return $this;
    }

    /**
     * @return HttpClientInterface
     */
    public function getHttpClient()
    {
        if(is_null($this->httpClient))
        {
            $this->httpClient = new NullClient();
        }

        return $this->httpClient;
    }

    /**
     * @param SaferpayKeyValueInterface $data
     * @return string
     */
    public function initPayment(SaferpayKeyValueInterface $data)
    {
        $this->updateData(
            $this->getConfig()->getInitValidationsConfig(),
            $this->getConfig()->getInitDefaultsConfig(),
            $this->getData()->getInitData(),
            $data
        );

        $response = $this->request(
            $this->getConfig()->getInitUrl(),
            $this->getData()->getInitData()
        );

        $this->getData()->setInitSignature(self::parameterFromUrl($response, 'SIGNATURE'));

        return $response;
    }

    /**
     * @param string $xml
     * @param string $signature
     * @return string
     */
    public function confirmPayment($xml, $signature)
    {
        $data = $this->getKeyValuePrototype();

        $this->prepareFragment($xml, $data);

        $this->updateData(
            $this->getConfig()->getConfirmValidationsConfig(),
            $this->getConfig()->getConfirmDefaultsConfig(),
            $this->getData()->getConfirmData(),
            $data
        );

        $this->getData()->setConfirmSignature($signature);

        return $this->request(
            $this->getConfig()->getConfirmUrl(),
            $this->getKeyValuePrototype()->all(array(
                'DATA' => $xml,
                'SIGNATURE' => $this->getData()->getConfirmSignature()
            )
        ));
    }

    /**
     * @param string $action
     * @return string
     */
    public function completePayment($action = 'Settlement')
    {
        if(!$this->getData()->getConfirmData()->has('ID'))
        {
            $this->getLogger()->critical('Call confirm payment first!');
            return '';
        }

        $data = $this->getKeyValuePrototype()->all(array(
            'ID' => $this->getData()->getConfirmData()->get('ID'),
            'TOKEN' => $this->getData()->getConfirmData()->get('TOKEN'),
            'AMOUNT' => $this->getData()->getInitData()->get('AMOUNT'),
            'ACCOUNTID' => $this->getData()->getInitData()->get('ACCOUNTID'),
            'ACTION' => $action,
        ));

        // add password for test accounts
        if(substr($this->getData()->getInitData()->get('ACCOUNTID'), 0, 6) == "99867-")
        {
            $data->set('spPassword', 'XAjc3Kna');
        }

        $response = $this->request(
            $this->getConfig()->getCompleteUrl(),
            $data
        );

        if(substr($response, 0, 2) == 'OK')
        {
            $this->prepareFragment(substr($response, 3), $data);
        }

        $this->updateData(
            $this->getConfig()->getCompleteValidationsConfig(),
            $this->getConfig()->getCompleteDefaultsConfig(),
            $this->getData()->getCompleteData(),
            $data
        );

        return $response;
    }

    /**
     * @param SaferpayKeyValueInterface $validator
     * @param SaferpayKeyValueInterface $default
     * @param SaferpayKeyValueInterface $data
     * @param SaferpayKeyValueInterface $newData
     */
    protected function updateData(SaferpayKeyValueInterface $validator, SaferpayKeyValueInterface $default, SaferpayKeyValueInterface $data, SaferpayKeyValueInterface $newData)
    {
        foreach($newData as $key => $value)
        {
            $this->setValue($validator, $data, $key, $value);
        }

        foreach($default as $key => $value)
        {
            // do no overwrite data with defaults
            if(!$data->has($key))
            {
                $this->setValue($validator, $data, $key, $value);
            }
        }
    }

    /**
     * @param SaferpayKeyValueInterface $validator
     * @param SaferpayKeyValueInterface $data
     * @param string $key
     * @param scalar $value
     */
    protected function setValue(SaferpayKeyValueInterface $validator, SaferpayKeyValueInterface $data, $key, $value)
    {
        if(!$validator->has($key))
        {
            $this->getLogger()->warning("saferpay: Can't find validator for key {key}", array('key' => $key));
            return;
        }

        if(!self::isValidValue($validator->get($key), $value))
        {
            $this->getLogger()->warning("saferpay: Can't validate value {value} for key {key} against validator {validator}", array(
                'validator' => $validator->get($key),
                'key' => $key,
                'value' => $value,
            ));
            return;
        }

        $data->set($key, $value);
    }

    /**
     * @param string $url
     * @param SaferpayKeyValueInterface $data
     * @return string
     */
    protected function request($url, SaferpayKeyValueInterface $data)
    {
        $response = $this->getHttpClient()->request('POST', $url, self::keyValueToString($data), array('Content-Type' => 'application/x-www-form-urlencoded'));

        if($response->getStatusCode() != 200)
        {
            $this->getLogger()->critical("saferpay: request failed with statuscode {statuscode}", array('statuscode' => $response->getStatusCode()));
            return '';
        }

        if(strpos($response->getContent(), 'ERROR') !== false)
        {
            $this->getLogger()->critical("saferpay: request failed {content}", array('content' => $response->getContent()));
            return '';
        }

        return $response->getContent(true);
    }

    /**
     * @param $xml
     * @param SaferpayKeyValueInterface $data
     */
    protected function prepareFragment($xml, SaferpayKeyValueInterface $data)
    {
        $document = new \DOMDocument();
        $fragment = $document->createDocumentFragment();

        if(!$fragment->appendXML($xml))
        {
            $this->getLogger()->critical("saferpay: Invalid xml received from saferpay");
            return;
        }

        self::fragmentToKeyValue($fragment, $data);
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

    /**
     * @param \DOMDocumentFragment $fragment
     * @param SaferpayKeyValueInterface $data
     */
    public static function fragmentToKeyValue(\DOMDocumentFragment $fragment, SaferpayKeyValueInterface $data)
    {
        foreach($fragment->firstChild->attributes as $attribute)
        {
            /** @var \DOMAttr $attribute */
            $data->set($attribute->nodeName, $attribute->nodeValue);
        }
    }

    /**
     * @param SaferpayKeyValueInterface $data
     * @return string
     */
    public static function keyValueToString(SaferpayKeyValueInterface $data)
    {
        $content = '';

        foreach($data as $key => $value)
        {
            $content .= $key . '=' . urlencode($value) . '&';
        }

        return substr($content, 0, -1);
    }

    /**
     * @param string $url
     * @param string $key
     * @return string|null
     */
    public static function parameterFromUrl($url, $key)
    {
        parse_str(parse_url($url, PHP_URL_QUERY), $parameters);
        return is_array($parameters) && array_key_exists($key, $parameters) ? $parameters[$key] : '';
    }
}
