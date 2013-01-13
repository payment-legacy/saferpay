<?php

namespace Payment\Saferpay\Http\Client;

use Guzzle\Http\Client;

class GuzzleClientWrapper implements HttpClientInterface
{
    /**
     * @var Client
     */
    protected $client;

    public function setClient(Client $client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        if(is_null($this->client))
        {
            $this->client = new Client();
        }

        return $this->client;
    }

    /**
     * @param string $method
     * @param string $url
     * @param null $content
     * @param array $headers
     * @param array $options
     * @return ResponseInterface
     * @throws HttpException
     */
    public function request($method, $url, $content = null, array $headers = array(), array $options = array())
    {
        try
        {
            $originalResponse = $this->getClient()->createRequest($method, $url, $headers, $content)->send();

            return new GuzzleResponseWrapper(
                $originalResponse->getStatusCode(),
                $originalResponse->getContentType(),
                $originalResponse->getBody(true),
                $originalResponse->getHeaders()->toArray()
            );
        }
        catch(\Exception $e)
        {
            throw new HttpException($e);
        }
    }
}