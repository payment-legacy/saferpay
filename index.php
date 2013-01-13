<?php

namespace Payment\Saferpay;

require "../../../../autoload.php";

use Payment\Saferpay\Saferpay;

session_start();

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
$saferpay->getConfig()->setInitValidationConfig(new SaferpayKeyValue($arrConfig['validators']['init']));
$saferpay->getConfig()->setConfirmValidationConfig(new SaferpayKeyValue($arrConfig['validators']['confirm']));
$saferpay->getConfig()->setCompleteValidationConfig(new SaferpayKeyValue($arrConfig['validators']['complete']));

// set default config
$saferpay->getConfig()->setInitDefaultConfig(new SaferpayKeyValue($arrConfig['defaults']['init']));
$saferpay->getConfig()->setConfirmDefaultConfig(new SaferpayKeyValue($arrConfig['defaults']['confirm']));
$saferpay->getConfig()->setCompleteDefaultConfig(new SaferpayKeyValue($arrConfig['defaults']['complete']));

$saferpay->setData($saferpayData);

if(getParam('status') == 'success')
{
    if($saferpay->confirmPayment(getParam('DATA'), getParam('SIGNATURE')) != '')
    {
        $lastresponse = $saferpay->completePayment();

        if($lastresponse != '')
        {
            unset($_SESSION['saferpay.data']);
        }
    }
}
else
{
    $url = $saferpay->initPayment(new SaferpayKeyValue(array(
        'AMOUNT' => 10250,
        'DESCRIPTION' => sprintf('Bestellnummer: %s', '000001'),
        'ORDERID' => '000001',
        'SUCCESSLINK' => requestUrl() . '?status=success',
        'FAILLINK' => requestUrl() . '?status=fail',
        'BACKLINK' => requestUrl(),
    )));

    // assign the data to the session
    $_SESSION['saferpay.data'] = $saferpay->getData();

    if($url != '')
    {
        // redirect to saferpay
        header("Location: {$url}", 302);
    }
}

// show saferpay object
printData($saferpay);

function requestUrl()
{
    $protocol = strtolower(substr($_SERVER['SERVER_PROTOCOL'], 0, strpos($_SERVER['SERVER_PROTOCOL'], '/')));
    return $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

function getParam($key, $default = null)
{
    return array_key_exists($key, $_GET) ? $_GET[$key] : $default;
}

function printData($mixData, $boolDie = false)
{
    echo '<pre>';
    print_r($mixData);
    echo '</pre>';
    if($boolDie){ die(); }
}