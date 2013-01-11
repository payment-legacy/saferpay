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
     * @param SaferpayKeyValue $validationConfig
     * @return self
     */
    public function setInitValidationConfig(SaferpayKeyValue $validationConfig);

    /**
     * @return SaferpayKeyValue
     */
    public function getInitValidationConfig();

    /**
     * @param SaferpayKeyValue $validationConfig
     * @return self
     */
    public function setConfirmValidationConfig(SaferpayKeyValue $validationConfig);

    /**
     * @return SaferpayKeyValue
     */
    public function getConfirmValidationConfig();

    /**
     * @param SaferpayKeyValue $validationConfig
     * @return self
     */
    public function setCompleteValidationConfig(SaferpayKeyValue $validationConfig);

    /**
     * @return SaferpayKeyValue
     */
    public function getCompleteValidationConfig();

    /**
     * @param SaferpayKeyValue $defaultConfig
     * @return self
     */
    public function setInitDefaultConfig(SaferpayKeyValue $defaultConfig);

    /**
     * @return SaferpayKeyValue
     */
    public function getInitDefaultConfig();

    /**
     * @param SaferpayKeyValue $defaultConfig
     * @return self
     */
    public function setConfirmDefaultConfig(SaferpayKeyValue $defaultConfig);

    /**
     * @return SaferpayKeyValue
     */
    public function getConfirmDefaultConfig();

    /**
     * @param SaferpayKeyValue $defaultConfig
     * @return self
     */
    public function setCompleteDefaultConfig(SaferpayKeyValue $defaultConfig);

    /**
     * @return SaferpayKeyValue
     */
    public function getCompleteDefaultConfig();
}