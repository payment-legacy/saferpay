<?php

namespace Payment\Saferpay\Http\Client;

/**
 * A HTTP Client
 */
interface HttpClientInterface
{
    /**
     * Send a http-request and return a http-response.
     *
     * @param string $method HTTP method, uppercase
     * @param string $url Url to send HTTP request to
     * @param string $content Content of the request, can be empty.
     * @param array $headers Array of Headers, header Name is the key.
     * @param array $options Vendor specific options to activate specific features.
     * @throws HttpException If no response can be created an exception should be thrown.
     * @return ResponseInterface
     */
    public function request($method, $url, $content = null, array $headers = array(), array $options = array());
}