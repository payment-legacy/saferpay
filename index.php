<?php

namespace Payment\Saferpay;

require 'vendor/autoload.php';

use Payment\HttpClient\BuzzClient;
use Payment\Saferpay\Data\PayInitParameter;

$saferpay = new Saferpay;
$saferpay->setHttpClient(new BuzzClient());

$amount = 1200;
$currency = 'CHF';

if (getParam('status') == 'success') {
    $payConfirmParameter = $saferpay->verifyPayConfirm(getParam('DATA'), getParam('SIGNATURE'));
    if ($payConfirmParameter->getAMOUNT() == $amount && $payConfirmParameter->getCURRENCY() == $currency) {
        $saferpay->payCompleteV2($payConfirmParameter, 'Settlement');
        echo 'payment success!';
    } else {
        $saferpay->payCompleteV2($payConfirmParameter, 'Cancel');
        echo 'payment failed!';
    }
} else {
    $payInitParameter = new PayInitParameter();
    $payInitParameter->setAccountid(PayInitParameter::SAFERPAYTESTACCOUNT_ACCOUNTID);
    $payInitParameter->setAmount($amount);
    $payInitParameter->setCurrency($currency);
    $payInitParameter->setDescription(sprintf('Ordernumber: %s', '000001'));
    $payInitParameter->setSuccesslink(requestUrl() . '?status=success');
    $payInitParameter->setFaillink(requestUrl() . '?status=fail');
    $payInitParameter->setBacklink(requestUrl() . '?status=back');
    $payInitParameter->setDelivery('no'); // hide address form
    header('Location: ' . $saferpay->createPayInit($payInitParameter) , 302);
}

function requestUrl()
{
    $protocol = strtolower(substr($_SERVER['SERVER_PROTOCOL'], 0, strpos($_SERVER['SERVER_PROTOCOL'], '/')));

    return $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

function getParam($key, $default = null)
{
    return array_key_exists($key, $_REQUEST) ? $_REQUEST[$key] : $default;
}
