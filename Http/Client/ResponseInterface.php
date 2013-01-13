<?php

namespace Payment\Saferpay\Http\Client;

/**
 * Http Response returned from {@see HttpClientInterface::request}.
 */
interface ResponseInterface
{
    /**
     * Status code for the response
     *
     * @return int
     */
    public function getStatusCode();

    /**
     * Get content type for the response
     *
     * @return string
     */
    public function getContentType();

    /**
     * Get the content of this response
     *
     * @return string
     */
    public function getContent();

    /**
     * Return all headers of this response.
     *
     * Header names are returned as lower-case keys. Their values are returned
     * in an array themselves to support multiple occurances of headers.
     *
     * @example array(array("content-type" => array("text/html"))
     *
     * @return array
     */
    public function getHeaders();

    /**
     * Return a specified header of this response or null if not found,
     *
     * Returns an array no matter if single or multiple occurances of a header exist.
     *
     * @return array|null
     */
    public function getHeader($name);
}