<?php

namespace Payment\Saferpay;

require "../../../../autoload.php";

use Ardent\HashMap;
use Payment\Saferpay\SaferpayConfig;
use Payment\Saferpay\SaferpayData;
use Payment\Saferpay\SaferpayHelper;
use Payment\Saferpay\Saferpay;

session_start();
session_destroy();

// get all config data from json
$arrConfig = json_decode(file_get_contents('config.json'), true);

// create saferpay config
$saferpayConfig = new SaferpayConfig();

// set url config
$saferpayConfig->setInitUrl($arrConfig['urls']['init']);
$saferpayConfig->setConfirmUrl($arrConfig['urls']['confirm']);
$saferpayConfig->setCompleteUrl($arrConfig['urls']['complete']);

// set validation config
$saferpayConfig->setInitValidationConfig(new \ArrayObject($arrConfig['validators']['init']));
$saferpayConfig->setConfirmValidationConfig(new \ArrayObject($arrConfig['validators']['confirm']));
$saferpayConfig->setCompleteValidationConfig(new \ArrayObject($arrConfig['validators']['complete']));

// set default config
$saferpayConfig->setInitDefaultConfig(new \ArrayObject($arrConfig['defaults']['init']));
$saferpayConfig->setConfirmDefaultConfig(new \ArrayObject($arrConfig['defaults']['confirm']));
$saferpayConfig->setCompleteDefaultConfig(new \ArrayObject($arrConfig['defaults']['complete']));

if(!array_key_exists('saferpay', $_SESSION))
{
    // create empty data
    $saferpayData = new SaferpayData();

    // set the initial values
    $saferpayData->setInitData(new \ArrayObject());
    $saferpayData->setConfirmData(new \ArrayObject());
    $saferpayData->setCompleteData(new \ArrayObject());
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