<?php

namespace Payment\Saferpay;

use Payment\HttpClient\HttpClientInterface;
use Payment\Saferpay\Data\AbstractData;
use Payment\Saferpay\Data\PayCompleteParameter;
use Payment\Saferpay\Data\PayCompleteResponse;
use Payment\Saferpay\Data\PayConfirmParameter;
use Payment\Saferpay\Data\PayInitParameterWithDataInterface;
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
     * @param  PayInitParameterWithDataInterface $payInitParameter
     * @return string
     */
    public function createPayInit(PayInitParameterWithDataInterface $payInitParameter)
    {
        return $this->request($payInitParameter->getRequestUrl(), $payInitParameter->getData());
    }

    /**
     * @param $xml
     * @param $signature
     * @return PayConfirmParameter
     */
    public function verifyPayConfirm($xml, $signature)
    {
        $payConfirmParameter = new PayConfirmParameter();
        $this->fillDataFromXML($payConfirmParameter, $xml);
        $this->request($payConfirmParameter->getRequestUrl(), array(
            'DATA' => $xml,
            'SIGNATURE' => $signature
        ));

        return $payConfirmParameter;
    }

    /**
     * @param  PayConfirmParameter $payConfirmParameter
     * @param  string              $action
     * @return PayCompleteResponse
     * @throws \Exception
     */
    public function payCompleteV2(PayConfirmParameter $payConfirmParameter, $action = 'Settlement')
    {
        if (is_null($payConfirmParameter->getId())) {
            $this->getLogger()->critical('Saferpay: call confirm before complete!');
            throw new \Exception('Saferpay: call confirm before complete!');
        }

        $payCompleteParameter = new PayCompleteParameter();
        $payCompleteParameter->setId($payConfirmParameter->getId());
        $payCompleteParameter->setAmount($payConfirmParameter->getAmount());
        $payCompleteParameter->setAccountid($payConfirmParameter->getAccountid());
        $payCompleteParameter->setAction($action);

        if (substr($payCompleteParameter->getAccountid(), 0, 6) == '99867-') {
            $response = $this->request($payCompleteParameter->getRequestUrl(), array_merge($payCompleteParameter->getData(), array('spPassword' => 'XAjc3Kna')));
        } else {
            $response = $this->request($payCompleteParameter->getRequestUrl(), $payCompleteParameter->getData());
        }

        $payCompleteResponse = new PayCompleteResponse();
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
     * @param AbstractData $data
     * @param $xml
     * @throws \Exception
     */
    protected function fillDataFromXML(AbstractData $data, $xml)
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
}
