<?php

require 'Config/DefaultConfigInterface.php';
require 'Config/DefaultConfig.php';
require 'Config/SaferpayConfigInterface.php';
require 'Config/SaferpayConfig.php';
require 'Config/UrlConfigInterface.php';
require 'Config/UrlConfig.php';
require 'Config/ValidationConfigInterface.php';
require 'Config/ValidationConfig.php';
require 'Config/ValidationConfigCollectionInterface.php';
require 'Config/ValidationConfigCollection.php';

require 'Saferpay.php';

use Saferpay\Config\DefaultConfig;
use Saferpay\Config\SaferpayConfig;
use Saferpay\Config\SaferpayConfigInterface;
use Saferpay\Config\UrlConfig;
use Saferpay\Config\ValidationConfigCollection;
use Saferpay\Config\ValidationConfig;

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