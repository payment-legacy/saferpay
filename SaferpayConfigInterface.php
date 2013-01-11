<?php

namespace Payment\Saferpay;


interface SaferpayConfigInterface
{
    /**
     * @param string $url
     * @return self
     */
    public function setInitUrl($url);

    /**
     * @return string
     */
    public function getInitUrl();

    /**
     * @param string $url
     * @return self
     */
    public function setConfirmUrl($url);

    /**
     * @return string
     */
    public function getConfirmUrl();

    /**
     * @param string $url
     * @return self
     */
    public function setCompleteUrl($url);

    /**
     * @return string
     */
    public function getCompleteUrl();

    /**
     * @param \ArrayObject $validationConfig
     * @return self
     */
    public function setInitValidationConfig(\ArrayObject $validationConfig);

    /**
     * @return \ArrayObject
     */
    public function getInitValidationConfig();

    /**
     * @param \ArrayObject $validationConfig
     * @return self
     */
    public function setConfirmValidationConfig(\ArrayObject $validationConfig);

    /**
     * @return \ArrayObject
     */
    public function getConfirmValidationConfig();

    /**
     * @param \ArrayObject $validationConfig
     * @return self
     */
    public function setCompleteValidationConfig(\ArrayObject $validationConfig);

    /**
     * @return \ArrayObject
     */
    public function getCompleteValidationConfig();

    /**
     * @param \ArrayObject $defaultConfig
     * @return self
     */
    public function setInitDefaultConfig(\ArrayObject $defaultConfig);

    /**
     * @return \ArrayObject
     */
    public function getInitDefaultConfig();

    /**
     * @param \ArrayObject $defaultConfig
     * @return self
     */
    public function setConfirmDefaultConfig(\ArrayObject $defaultConfig);

    /**
     * @return \ArrayObject
     */
    public function getConfirmDefaultConfig();

    /**
     * @param \ArrayObject $defaultConfig
     * @return self
     */
    public function setCompleteDefaultConfig(\ArrayObject $defaultConfig);

    /**
     * @return \ArrayObject
     */
    public function getCompleteDefaultConfig();
}