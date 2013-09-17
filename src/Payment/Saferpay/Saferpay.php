<?php

namespace Payment\Saferpay;

use Payment\HttpClient\HttpClientInterface;
use Payment\Saferpay\Data\Collection\CollectionItemInterface;
use Payment\Saferpay\Data\PayCompleteParameter;
use Payment\Saferpay\Data\PayCompleteParameterInterface;
use Payment\Saferpay\Data\PayCompleteResponse;
use Payment\Saferpay\Data\PayConfirmParameter;
use Payment\Saferpay\Data\PayInitParameterInterface;
use Payment\Saferpay\Exception\NoPasswordGivenException;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class Saferpay
{
    /**
     * @var HttpClientInterface
     */
    protected $httpClient;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @param HttpClientInterface $httpClient
     * @return $this
     */
    public function setHttpClient(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    /**
     * @return HttpClientInterface
     * @throws \Exception
     */
    protected function getHttpClient()
    {
        if (is_null($this->httpClient)) {
            throw new \Exception('Please define a http client based on the HttpClientInterface!');
        }

        return $this->httpClient;
    }

    /**
     * @param LoggerInterface $logger
     * @return $this
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;

        return $this;
    }

    /**
     * @return LoggerInterface
     */
    protected function getLogger()
    {
        if (is_null($this->logger)) {
            $this->logger = new NullLogger();
        }

        return $this->logger;
    }

    /**
     * @param  CollectionItemInterface $payInitParameter
     * @return mixed
     */
    public function createPayInit(CollectionItemInterface $payInitParameter)
    {
        return $this->request($payInitParameter->getRequestUrl(), $payInitParameter->getData());
    }

    /**
     * @param $xml
     * @param $signature
     * @param  CollectionItemInterface $payConfirmParameter
     * @return CollectionItemInterface
     */
    public function verifyPayConfirm($xml, $signature, CollectionItemInterface $payConfirmParameter = null)
    {
        if (is_null($payConfirmParameter)) {
            $payConfirmParameter = new PayConfirmParameter();
        }

        $this->fillDataFromXML($payConfirmParameter, $xml);
        $this->request($payConfirmParameter->getRequestUrl(), array(
            'DATA' => $xml,
            'SIGNATURE' => $signature
        ));

        return $payConfirmParameter;
    }

    /**
     * @param  CollectionItemInterface            $payConfirmParameter
     * @param  string                             $action
     * @param  null                               $spPassword
     * @param  CollectionItemInterface            $payCompleteParameter
     * @param  CollectionItemInterface            $payCompleteResponse
     * @return CollectionItemInterface
     * @throws Exception\NoPasswordGivenException
     * @throws \Exception
     */
    public function payCompleteV2(
        CollectionItemInterface $payConfirmParameter,
        $action = PayCompleteParameterInterface::ACTION_SETTLEMENT,
        $spPassword = null,
        CollectionItemInterface $payCompleteParameter = null,
        CollectionItemInterface $payCompleteResponse = null
    ) {
        if (is_null($payConfirmParameter->get('ID'))) {
            $this->getLogger()->critical('Saferpay: call confirm before complete!');
            throw new \Exception('Saferpay: call confirm before complete!');
        }

        if (is_null($payCompleteParameter)) {
            $payCompleteParameter = new PayCompleteParameter();
        }

        $payCompleteParameter->set('ID', $payConfirmParameter->get('ID'));
        $payCompleteParameter->set('AMOUNT', $payConfirmParameter->get('AMOUNT'));
        $payCompleteParameter->set('ACCOUNTID', $payConfirmParameter->get('ACCOUNTID'));
        $payCompleteParameter->set('ACTION', $action);

        $payCompleteParameterData = $payCompleteParameter->getData();

        if ($this->isTestAccountId($payCompleteParameter->get('ACCOUNTID'))) {
            $payCompleteParameterData = array_merge($payCompleteParameterData, array('spPassword' => PayInitParameterInterface::SAFERPAYTESTACCOUNT_SPPASSWORD));
        } elseif ($action != PayCompleteParameterInterface::ACTION_SETTLEMENT && !$spPassword) {
            throw new NoPasswordGivenException();
        }

        $response = $this->request($payCompleteParameter->getRequestUrl(), $payCompleteParameterData);

        if (is_null($payCompleteResponse)) {
            $payCompleteResponse = new PayCompleteResponse();
        }

        $this->fillDataFromXML($payCompleteResponse, substr($response, 3));

        return $payCompleteResponse;
    }

    /**
     * @param $url
     * @param  array      $data
     * @return mixed
     * @throws \Exception
     */
    protected function request($url, array $data)
    {
        $response = $this->getHttpClient()->request(
            'POST',
            $url,
            http_build_query($data),
            array('Content-Type' => 'application/x-www-form-urlencoded')
        );

        if ($response->getStatusCode() != 200) {
            $this->getLogger()->critical('Saferpay: request failed with statuscode: {statuscode}!', array('statuscode' => $response->getStatusCode()));
            throw new \Exception('Saferpay: request failed with statuscode: ' . $response->getStatusCode() . '!');
        }

        if (strpos($response->getContent(), 'ERROR') !== false) {
            $this->getLogger()->critical('Saferpay: request failed: {content}!', array('content' => $response->getContent()));
            throw new \Exception('Saferpay: request failed: ' . $response->getContent() . '!');
        }

        return $response->getContent();
    }

    /**
     * @param CollectionItemInterface $data
     * @param $xml
     * @throws \Exception
     */
    protected function fillDataFromXML(CollectionItemInterface $data, $xml)
    {
        $document = new \DOMDocument();
        $fragment = $document->createDocumentFragment();

        if (!$fragment->appendXML($xml)) {
            $this->getLogger()->critical('Saferpay: Invalid xml received from saferpay');
            throw new \Exception('Saferpay: Invalid xml received from saferpay!');
        }

        foreach ($fragment->firstChild->attributes as $attribute) {
            /** @var \DOMAttr $attribute */
            $data->set($attribute->nodeName, $attribute->nodeValue);
        }
    }

    /**
     * @param  string $accountId
     * @return bool
     */
    protected function isTestAccountId($accountId)
    {
        $prefix = PayInitParameterInterface::TESTACCOUNT_PREFIX;

        return substr($accountId, 0, strlen($prefix)) === $prefix;
    }
}
