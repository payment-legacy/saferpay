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
     * @param SaferpayAttribute $validationConfig
     * @return self
     */
    public function setInitValidationConfig(SaferpayAttribute $validationConfig);

    /**
     * @return SaferpayAttribute
     */
    public function getInitValidationConfig();

    /**
     * @param SaferpayAttribute $validationConfig
     * @return self
     */
    public function setConfirmValidationConfig(SaferpayAttribute $validationConfig);

    /**
     * @return SaferpayAttribute
     */
    public function getConfirmValidationConfig();

    /**
     * @param SaferpayAttribute $validationConfig
     * @return self
     */
    public function setCompleteValidationConfig(SaferpayAttribute $validationConfig);

    /**
     * @return SaferpayAttribute
     */
    public function getCompleteValidationConfig();

    /**
     * @param SaferpayAttribute $defaultConfig
     * @return self
     */
    public function setInitDefaultConfig(SaferpayAttribute $defaultConfig);

    /**
     * @return SaferpayAttribute
     */
    public function getInitDefaultConfig();

    /**
     * @param SaferpayAttribute $defaultConfig
     * @return self
     */
    public function setConfirmDefaultConfig(SaferpayAttribute $defaultConfig);

    /**
     * @return SaferpayAttribute
     */
    public function getConfirmDefaultConfig();

    /**
     * @param SaferpayAttribute $defaultConfig
     * @return self
     */
    public function setCompleteDefaultConfig(SaferpayAttribute $defaultConfig);

    /**
     * @return SaferpayAttribute
     */
    public function getCompleteDefaultConfig();
}