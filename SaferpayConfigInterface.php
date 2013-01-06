<?php

namespace Saferpay;

interface SaferpayConfigInterface
{
    const Init = 'init';
    const Confirm = 'confirm';
    const Complete = 'complete';

    /**
     * @param UrlConfigInterface $urlConfig
     * @return self
     */
    public function setUrlConfig(UrlConfigInterface $urlConfig);

    /**
     * @return UrlConfigInterface
     */
    public function getUrlConfig();

    /**
     * @param ValidationConfigCollectionInterface $validationConfigCollection
     * @return self
     */
    public function setValidationConfigCollection(ValidationConfigCollectionInterface $validationConfigCollection);

    /**
     * @return ValidationConfigCollectionInterface
     */
    public function getValidationConfigCollection();

    /**
     * @param DefaultConfigInterface $defaultConfig
     * @return self
     */
    public function setDefaultConfig(DefaultConfigInterface $defaultConfig);

    /**
     * @return DefaultConfigInterface
     */
    public function getDefaultConfig();
}