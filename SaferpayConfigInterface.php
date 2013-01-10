<?php

namespace Payment\Saferpay;

use Ardent\Map as MapInterface;

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
     * @param MapInterface $validationConfig
     * @return self
     */
    public function setInitValidationConfig(MapInterface $validationConfig);

    /**
     * @return MapInterface
     */
    public function getInitValidationConfig();

    /**
     * @param MapInterface $validationConfig
     * @return self
     */
    public function setConfirmValidationConfig(MapInterface $validationConfig);

    /**
     * @return MapInterface
     */
    public function getConfirmValidationConfig();

    /**
     * @param MapInterface $validationConfig
     * @return self
     */
    public function setCompleteValidationConfig(MapInterface $validationConfig);

    /**
     * @return MapInterface
     */
    public function getCompleteValidationConfig();

    /**
     * @param MapInterface $defaultConfig
     * @return self
     */
    public function setInitDefaultConfig(MapInterface $defaultConfig);

    /**
     * @return MapInterface
     */
    public function getInitDefaultConfig();

    /**
     * @param MapInterface $defaultConfig
     * @return self
     */
    public function setConfirmDefaultConfig(MapInterface $defaultConfig);

    /**
     * @return MapInterface
     */
    public function getConfirmDefaultConfig();

    /**
     * @param MapInterface $defaultConfig
     * @return self
     */
    public function setCompleteDefaultConfig(MapInterface $defaultConfig);

    /**
     * @return MapInterface
     */
    public function getCompleteDefaultConfig();
}