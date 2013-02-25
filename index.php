<?php

namespace Payment\Saferpay;

require "../../../../autoload.php";

use Payment\HttpClient\BuzzClient;
use Payment\Saferpay\Saferpay;

session_start();

// create a new saferpay instance (implement as service)
$saferpay = new Saferpay();

// get all config data from json
$config = $saferpay->getSaferpayConfig();

// update config
$saferpay->getConfig()->setInitUrl($config['urls']['init']);
$saferpay->getConfig()->setConfirmUrl($config['urls']['confirm']);
$saferpay->getConfig()->setCompleteUrl($config['urls']['complete']);

// set validation config
$saferpay->getConfig()->getInitValidationsConfig()->all($config['validators']['init']);
$saferpay->getConfig()->getConfirmValidationsConfig()->all($config['validators']['confirm']);
$saferpay->getConfig()->getCompleteValidationsConfig()->all($config['validators']['complete']);

// set default config
$saferpay->getConfig()->getInitDefaultsConfig()->all($config['defaults']['init']);
$saferpay->getConfig()->getConfirmDefaultsConfig()->all($config['defaults']['confirm']);
$saferpay->getConfig()->getCompleteDefaultsConfig()->all($config['defaults']['complete']);

// set http client
$saferpay->setHttpClient(new BuzzClient());

// set data
$saferpay->setData(getSession('saferpay.data', null));

if(getParam('status') == 'success')
{
    if($saferpay->confirmPayment(getParam('DATA'), getParam('SIGNATURE')) != '')
    {
        $lastresponse = $saferpay->completePayment();

        if($lastresponse != '')
        {
            setSession('saferpay.data', null);
        }
    }
}
else
{
    $url = $saferpay->initPayment($saferpay->getKeyValuePrototype()->all(array(
        'AMOUNT' => 10250,
        'DESCRIPTION' => sprintf('Bestellnummer: %s', '000001'),
        'ORDERID' => '000001',
        'SUCCESSLINK' => requestUrl() . '?status=success',
        'FAILLINK' => requestUrl() . '?status=fail',
        'BACKLINK' => requestUrl(),
        'GENDER' => 'm',
        'FIRSTNAME' => 'Hans',
        'LASTNAME' => 'Muster',
        'STREET' => 'Musterstrasse 300',
        'ZIP' => '0000',
        'CITY' => 'Musterort',
        'COUNTRY' => 'CH',
        'EMAIL' => 'test@test.ch'
    )));

    // assign the data to the session
    setSession('saferpay.data', $saferpay->getData());

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

function setSession($key, $value)
{
    $_SESSION[$key] = $value;
}

function getSession($key, $default = null)
{
    return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;
}

function printData($mixData, $boolDie = false)
{
    echo '<pre>';
    print_r($mixData);
    echo '</pre>';
    if($boolDie){ die(); }
}
