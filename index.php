<?php

require 'UrlConfigInterface.php';
require 'UrlConfig.php';
require 'ValidationConfigCollectionInterface.php';
require 'ValidationConfigCollection.php';
require 'ValidationConfigInterface.php';
require 'ValidationConfig.php';
require 'DefaultConfigInterface.php';
require 'DefaultConfig.php';
require 'SaferpayConfigInterface.php';
require 'SaferpayConfig.php';
require 'Saferpay.php';

use Saferpay\UrlConfig;
use Saferpay\ValidationConfigCollection;
use Saferpay\ValidationConfig;
use Saferpay\DefaultConfig;
use Saferpay\SaferpayConfigInterface;
use Saferpay\SaferpayConfig;
use Saferpay\Saferpay;

// get all config data from json
$arrConfig = json_decode(file_get_contents('config.json'), true);

// create saferpay config
$saferpayConfig = new SaferpayConfig();

// set url config
$saferpayConfig->setUrlConfig(new UrlConfig($arrConfig['urls']['base'], $arrConfig['urls']['routes']));

// create new validation config collection
$validationConfigCollection = new ValidationConfigCollection();
$validationConfigCollection->addValidatorConfig(SaferpayConfigInterface::Init, new ValidationConfig($arrConfig['validators'][SaferpayConfigInterface::Init]));
$validationConfigCollection->addValidatorConfig(SaferpayConfigInterface::Confirm, new ValidationConfig($arrConfig['validators'][SaferpayConfigInterface::Confirm]));
$validationConfigCollection->addValidatorConfig(SaferpayConfigInterface::Complete, new ValidationConfig($arrConfig['validators'][SaferpayConfigInterface::Complete]));

// set validation config collection
$saferpayConfig->setValidationConfigCollection($validationConfigCollection);

// set default config
$saferpayConfig->setDefaultConfig(new DefaultConfig($arrConfig['defaults']));

$saferpay = new Saferpay();
$saferpay->setConfig($saferpayConfig);

printData($saferpay);


function printData($mixData, $boolDie = false)
{
    echo '<pre>';
    print_r($mixData);
    echo '</pre>';
    if($boolDie){ die(); }
}