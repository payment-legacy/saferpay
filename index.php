<?php

require 'Config/DefaultConfigInterface.php';
require 'Config/DefaultConfig.php';
require 'Config/SaferpayConfigInterface.php';
require 'Config/SaferpayConfig.php';
require 'Config/ValidationConfigInterface.php';
require 'Config/ValidationConfig.php';

require 'Saferpay.php';

use Saferpay\Config\DefaultConfig;
use Saferpay\Config\SaferpayConfig;
use Saferpay\Config\ValidationConfig;

use Saferpay\Saferpay;

// get all config data from json
$arrConfig = json_decode(file_get_contents('config.json'), true);

// create saferpay config
$saferpayConfig = new SaferpayConfig();

// set url config
$saferpayConfig->setInitUrl($arrConfig['urls']['init']);
$saferpayConfig->setConfirmUrl($arrConfig['urls']['confirm']);
$saferpayConfig->setCompleteUrl($arrConfig['urls']['complete']);

// set validation config
$saferpayConfig->setInitValidationConfig(new ValidationConfig($arrConfig['validators']['init']));
$saferpayConfig->setConfirmValidationConfig(new ValidationConfig($arrConfig['validators']['confirm']));
$saferpayConfig->setCompleteValidationConfig(new ValidationConfig($arrConfig['validators']['complete']));

// set default config
$saferpayConfig->setInitDefaultConfig(new DefaultConfig($arrConfig['defaults']['init']));
$saferpayConfig->setConfirmDefaultConfig(new DefaultConfig($arrConfig['defaults']['confirm']));
$saferpayConfig->setCompleteDefaultConfig(new DefaultConfig($arrConfig['defaults']['complete']));

$saferpay = new Saferpay($saferpayConfig);

printData($saferpay);


function printData($mixData, $boolDie = false)
{
    echo '<pre>';
    print_r($mixData);
    echo '</pre>';
    if($boolDie){ die(); }
}