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
     * @param SaferpayKeyValueInterface $validationConfig
     * @return self
     */
    public function setInitValidationsConfig(SaferpayKeyValueInterface $validationConfig);

    /**
     * @return SaferpayKeyValueInterface
     */
    public function getInitValidationsConfig();

    /**
     * @param SaferpayKeyValueInterface $validationConfig
     * @return self
     */
    public function setConfirmValidationsConfig(SaferpayKeyValueInterface $validationConfig);

    /**
     * @return SaferpayKeyValueInterface
     */
    public function getConfirmValidationsConfig();

    /**
     * @param SaferpayKeyValueInterface $validationConfig
     * @return self
     */
    public function setCompleteValidationsConfig(SaferpayKeyValueInterface $validationConfig);

    /**
     * @return SaferpayKeyValueInterface
     */
    public function getCompleteValidationsConfig();

    /**
     * @param SaferpayKeyValueInterface $defaultConfig
     * @return self
     */
    public function setInitDefaultsConfig(SaferpayKeyValueInterface $defaultConfig);

    /**
     * @return SaferpayKeyValueInterface
     */
    public function getInitDefaultsConfig();

    /**
     * @param SaferpayKeyValueInterface $defaultConfig
     * @return self
     */
    public function setConfirmDefaultsConfig(SaferpayKeyValueInterface $defaultConfig);

    /**
     * @return SaferpayKeyValueInterface
     */
    public function getConfirmDefaultsConfig();

    /**
     * @param SaferpayKeyValueInterface $defaultConfig
     * @return self
     */
    public function setCompleteDefaultsConfig(SaferpayKeyValueInterface $defaultConfig);

    /**
     * @return SaferpayKeyValueInterface
     */
    public function getCompleteDefaultsConfig();

    /**
     * @param SaferpayKeyValueInterface $keyValuePrototype
     * @return Saferpay
     */
    public function setKeyValuePrototype(SaferpayKeyValueInterface $keyValuePrototype);

    /**
     * @return SaferpayKeyValueInterface
     */
    public function getKeyValuePrototype();
}