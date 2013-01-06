<?php

require 'Config/DefaultConfigInterface.php';
require 'Config/DefaultConfig.php';
require 'Config/SaferpayConfigInterface.php';
require 'Config/SaferpayConfig.php';
require 'Config/ValidationConfigInterface.php';
require 'Config/ValidationConfig.php';

require 'Data/DataInterface.php';
require 'Data/Data.php';
require 'Data/SaferpayDataInterface.php';
require 'Data/SaferpayData.php';

require 'Saferpay.php';

use Saferpay\Config\DefaultConfig;
use Saferpay\Config\SaferpayConfig;
use Saferpay\Config\ValidationConfig;
use Saferpay\Data\SaferpayData;
use Saferpay\Data\Data;
use Saferpay\Saferpay;

session_start();

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

if(!array_key_exists('saferpay', $_SESSION))
{
    // create empty data
    $saferpayData = new SaferpayData();

    // set the initial values
    $saferpayData->setInitData(new Data());
    $saferpayData->setConfirmData(new Data());
    $saferpayData->setCompleteData(new Data());
}
else
{
    $saferpayData = $_SESSION['saferpay'];
}

// create a new saferpay instance (implement as service)
$saferpay = new Saferpay($saferpayConfig, $saferpayData);

$saferpay->createPayInit(array(
    'AMOUNT' => 10250,
    'DESCRIPTION' => sprintf('Bestellnummer %s', '000001'),
    'ORDERID' => '000001',
    'SUCCESSLINK' => 'http://github.local/saferpay/?status=success',
    'FAILLINK' => 'http://github.local/saferpay/?status=fail',
    'BACKLINK' => 'http://github.local/saferpay/',
));

// assign the data to the session
$_SESSION['saferpay'] = $saferpayData;

// show saferpay object
printData($saferpay);


function printData($mixData, $boolDie = false)
{
    echo '<pre>';
    print_r($mixData);
    echo '</pre>';
    if($boolDie){ die(); }
}