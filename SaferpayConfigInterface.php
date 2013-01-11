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
     * @param \ArrayAccess $validationConfig
     * @return self
     */
    public function setInitValidationConfig(\ArrayAccess $validationConfig);

    /**
     * @return \ArrayAccess
     */
    public function getInitValidationConfig();

    /**
     * @param \ArrayAccess $validationConfig
     * @return self
     */
    public function setConfirmValidationConfig(\ArrayAccess $validationConfig);

    /**
     * @return \ArrayAccess
     */
    public function getConfirmValidationConfig();

    /**
     * @param \ArrayAccess $validationConfig
     * @return self
     */
    public function setCompleteValidationConfig(\ArrayAccess $validationConfig);

    /**
     * @return \ArrayAccess
     */
    public function getCompleteValidationConfig();

    /**
     * @param \ArrayAccess $defaultConfig
     * @return self
     */
    public function setInitDefaultConfig(\ArrayAccess $defaultConfig);

    /**
     * @return \ArrayAccess
     */
    public function getInitDefaultConfig();

    /**
     * @param \ArrayAccess $defaultConfig
     * @return self
     */
    public function setConfirmDefaultConfig(\ArrayAccess $defaultConfig);

    /**
     * @return \ArrayAccess
     */
    public function getConfirmDefaultConfig();

    /**
     * @param \ArrayAccess $defaultConfig
     * @return self
     */
    public function setCompleteDefaultConfig(\ArrayAccess $defaultConfig);

    /**
     * @return \ArrayAccess
     */
    public function getCompleteDefaultConfig();
}