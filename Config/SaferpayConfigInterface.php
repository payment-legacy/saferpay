<?php

namespace Saferpay\Config;

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
     * @param ValidationConfigInterface $validationConfig
     * @return self
     */
    public function setInitValidationConfig(ValidationConfigInterface $validationConfig);

    /**
     * @return ValidationConfigInterface
     */
    public function getInitValidationConfig();

    /**
     * @param ValidationConfigInterface $validationConfig
     * @return self
     */
    public function setConfirmValidationConfig(ValidationConfigInterface $validationConfig);

    /**
     * @return ValidationConfigInterface
     */
    public function getConfirmValidationConfig();

    /**
     * @param ValidationConfigInterface $validationConfig
     * @return self
     */
    public function setCompleteValidationConfig(ValidationConfigInterface $validationConfig);

    /**
     * @return ValidationConfigInterface
     */
    public function getCompleteValidationConfig();

    /**
     * @param DefaultConfigInterface $defaultConfig
     * @return self
     */
    public function setInitDefaultConfig(DefaultConfigInterface $defaultConfig);

    /**
     * @return ValidationConfigInterface
     */
    public function getInitDefaultConfig();

    /**
     * @param DefaultConfigInterface $defaultConfig
     * @return self
     */
    public function setConfirmDefaultConfig(DefaultConfigInterface $defaultConfig);

    /**
     * @return ValidationConfigInterface
     */
    public function getConfirmDefaultConfig();

    /**
     * @param DefaultConfigInterface $defaultConfig
     * @return self
     */
    public function setCompleteDefaultConfig(DefaultConfigInterface $defaultConfig);

    /**
     * @return ValidationConfigInterface
     */
    public function getCompleteDefaultConfig();
}