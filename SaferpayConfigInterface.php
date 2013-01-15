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
    public function setInitValidationsConfig(SaferpayKeyValue $validationConfig);

    /**
     * @return SaferpayKeyValue
     */
    public function getInitValidationsConfig();

    /**
     * @param SaferpayKeyValue $validationConfig
     * @return self
     */
    public function setConfirmValidationsConfig(SaferpayKeyValue $validationConfig);

    /**
     * @return SaferpayKeyValue
     */
    public function getConfirmValidationsConfig();

    /**
     * @param SaferpayKeyValue $validationConfig
     * @return self
     */
    public function setCompleteValidationsConfig(SaferpayKeyValue $validationConfig);

    /**
     * @return SaferpayKeyValue
     */
    public function getCompleteValidationsConfig();

    /**
     * @param SaferpayKeyValue $defaultConfig
     * @return self
     */
    public function setInitDefaultsConfig(SaferpayKeyValue $defaultConfig);

    /**
     * @return SaferpayKeyValue
     */
    public function getInitDefaultsConfig();

    /**
     * @param SaferpayKeyValue $defaultConfig
     * @return self
     */
    public function setConfirmDefaultsConfig(SaferpayKeyValue $defaultConfig);

    /**
     * @return SaferpayKeyValue
     */
    public function getConfirmDefaultsConfig();

    /**
     * @param SaferpayKeyValue $defaultConfig
     * @return self
     */
    public function setCompleteDefaultsConfig(SaferpayKeyValue $defaultConfig);

    /**
     * @return SaferpayKeyValue
     */
    public function getCompleteDefaultsConfig();
}