<?php

namespace Saferpay;

class Saferpay
{
    /** @var SaferpayConfigInterface */
    protected $config;

    public function __construct(SaferpayConfigInterface $config = null)
    {
        $this->setConfig($config);
    }

    public function setConfig(SaferpayConfigInterface $config = null)
    {
        $this->config = $config;
    }
}