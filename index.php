<?php

namespace Payment\Saferpay;

require "../../../../autoload.php";

use Payment\Saferpay\Saferpay;

session_start();
session_destroy();

// get session data if exists
$saferpayData = isset($_SESSION) && is_array($_SESSION) && array_key_exists('saferpay.data', $_SESSION) ? $_SESSION['saferpay.data'] : null;

// create a new saferpay instance (implement as service)
$saferpay = new Saferpay();

// get all config data from json
$arrConfig = json_decode(file_get_contents('config.json'), true);

// update config
$saferpay->getConfig()->setInitUrl($arrConfig['urls']['init']);
$saferpay->getConfig()->setConfirmUrl($arrConfig['urls']['confirm']);
$saferpay->getConfig()->setCompleteUrl($arrConfig['urls']['complete']);

// set validation config
$saferpay->getConfig()->setInitValidationConfig(new SaferpayAttribute($arrConfig['validators']['init']));
$saferpay->getConfig()->setConfirmValidationConfig(new SaferpayAttribute($arrConfig['validators']['confirm']));
$saferpay->getConfig()->setCompleteValidationConfig(new SaferpayAttribute($arrConfig['validators']['complete']));

// set default config
$saferpay->getConfig()->setInitDefaultConfig(new SaferpayAttribute($arrConfig['defaults']['init']));
$saferpay->getConfig()->setConfirmDefaultConfig(new SaferpayAttribute($arrConfig['defaults']['confirm']));
$saferpay->getConfig()->setCompleteDefaultConfig(new SaferpayAttribute($arrConfig['defaults']['complete']));

$saferpay->setData($saferpayData);

$saferpay->createPayInit(new SaferpayAttribute(array(
    'AMOUNT' => 10250,
    'DESCRIPTION' => sprintf('Bestellnummer %s', '000001'),
    'ORDERID' => '000001',
    'SUCCESSLINK' => 'http://github.local/saferpay/?status=success',
    'FAILLINK' => 'http://github.local/saferpay/?status=fail',
    'BACKLINK' => 'http://github.local/saferpay/',
)));

// assign the data to the session
$_SESSION['saferpay.data'] = $saferpay->getData();

// show saferpay object
printData($saferpay);


function printData($mixData, $boolDie = false)
{
    echo '<pre>';
    print_r($mixData);
    echo '</pre>';
    if($boolDie){ die(); }
}