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
$saferpayConfig->setInitValidationConfig(SaferpayHelper::fillMap(new HashMap(), $arrConfig['validators']['init']));
$saferpayConfig->setConfirmValidationConfig(SaferpayHelper::fillMap(new HashMap(), $arrConfig['validators']['confirm']));
$saferpayConfig->setCompleteValidationConfig(SaferpayHelper::fillMap(new HashMap(), $arrConfig['validators']['complete']));

// set default config
$saferpayConfig->setInitDefaultConfig(SaferpayHelper::fillMap(new HashMap(), $arrConfig['defaults']['init']));
$saferpayConfig->setConfirmDefaultConfig(SaferpayHelper::fillMap(new HashMap(), $arrConfig['defaults']['confirm']));
$saferpayConfig->setCompleteDefaultConfig(SaferpayHelper::fillMap(new HashMap(), $arrConfig['defaults']['complete']));

if(!array_key_exists('saferpay', $_SESSION))
{
    // create empty data
    $saferpayData = new SaferpayData();

    // set the initial values
    $saferpayData->setInitData(new HashMap());
    $saferpayData->setConfirmData(new HashMap());
    $saferpayData->setCompleteData(new HashMap());
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