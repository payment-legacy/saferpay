<?php

namespace Payment\Saferpay;

use Payment\HttpClient\HttpClientInterface;
use Payment\Saferpay\Data\AbstractData;
use Payment\Saferpay\Data\PayCompleteParameter;
use Payment\Saferpay\Data\PayCompleteResponse;
use Payment\Saferpay\Data\PayConfirmParameter;
use Payment\Saferpay\Data\PayInitParameter;
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
    public function getHttpClient()
    {
        if(is_null($this->httpClient)) {
            throw new \Exception("Please define a http client based on the HttpClientInterface!");
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
    public function getLogger()
    {
        if(is_null($this->logger)) {
            $this->logger = new NullLogger();
        }
        return $this->logger;
    }

    /**
     * @param PayInitParameter $payInitParameter
     * @return string
     */
    public function createPayInit(PayInitParameter $payInitParameter)
    {
        return $this->request($payInitParameter->getRequestUrl(), $payInitParameter->getData());
    }

    /**
     * @param PayConfirmParameter $payConfirmParameter
     * @param $xml
     * @param $signature
     * @return string
     */
    public function verifyPayConfirm(PayConfirmParameter $payConfirmParameter, $xml, $signature)
    {
        $this->fillDataFromXML($payConfirmParameter, $xml);
        return $this->request($payConfirmParameter->getRequestUrl(), array(
            'DATA' => $xml,
            'SIGNATURE' => $signature
        ));
    }

    /**
     * @param PayConfirmParameter $payConfirmParameter
     * @param PayCompleteParameter $payCompleteParameter
     * @param PayCompleteResponse $payCompleteResponse
     * @param string $action
     * @return string
     * @throws \Exception
     */
    public function payCompleteV2(
        PayConfirmParameter $payConfirmParameter,
        PayCompleteParameter $payCompleteParameter,
        PayCompleteResponse $payCompleteResponse,
        $action = 'Settlement'
    )
    {
        if(is_null($payConfirmParameter->get('ID'))) {
            $this->getLogger()->critical("Saferpay: call confirm before complete!");
            throw new \Exception("Saferpay: call confirm before complete!");
        }

        $payCompleteParameter->setID($payConfirmParameter->getID());
        $payCompleteParameter->setAMOUNT($payConfirmParameter->getAMOUNT());
        $payCompleteParameter->setACCOUNTID($payConfirmParameter->getACCOUNTID());
        $payCompleteParameter->setACTION($action);

        if(substr($payCompleteParameter->getACCOUNTID(), 0, 6) == "99867-") {
            $response = $this->request($payCompleteParameter->getRequestUrl(), array_merge($payCompleteParameter->getData(), array('spPassword' => 'XAjc3Kna')));
        } else {
            $response = $this->request($payCompleteParameter->getRequestUrl(), $payCompleteParameter->getData());
        }

        $this->fillDataFromXML($payCompleteResponse, substr($response, 3));

        return $response;
    }

    /**
     * @param $url
     * @param array $data
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

        if($response->getStatusCode() != 200) {
            $this->getLogger()->critical("Saferpay: request failed with statuscode: {statuscode}!", array('statuscode' => $response->getStatusCode()));
            throw new \Exception("Saferpay: request failed with statuscode: {$response->getStatusCode()}!");
        }

        if(strpos($response->getContent(), 'ERROR') !== false) {
            $this->getLogger()->critical("Saferpay: request failed: {content}!", array('content' => $response->getContent()));
            throw new \Exception("Saferpay: request failed: {$response->getContent()}!");
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

        if(!$fragment->appendXML($xml)) {
            $this->getLogger()->critical("Saferpay: Invalid xml received from saferpay");
            throw new \Exception("Saferpay: Invalid xml received from saferpay!");
        }

        foreach($fragment->firstChild->attributes as $attribute)
        {
            /** @var \DOMAttr $attribute */
            $data->set($attribute->nodeName, $attribute->nodeValue);
        }
    }
}