<?php

namespace Payment\Saferpay;

require "../../../../autoload.php";

use Payment\HttpClient\BuzzClient;
use Payment\Saferpay\Data\PayCompleteParameter;
use Payment\Saferpay\Data\PayCompleteResponse;
use Payment\Saferpay\Data\PayConfirmParameter;
use Payment\Saferpay\Data\PayInitParameter;

$saferpay = new Saferpay;
$saferpay->setHttpClient(new BuzzClient());

$amount = 1200;
$currency = 'CHF';

if(getParam('status') == 'success') {
    $payConfirmParameter = new PayConfirmParameter();
    $payCompleteParameter = new PayCompleteParameter();
    $payCompleteResponse = new PayCompleteResponse();
    $saferpay->verifyPayConfirm($payConfirmParameter, getParam('DATA'), getParam('SIGNATURE'));
    if($payConfirmParameter->getAMOUNT() == $amount && $payConfirmParameter->getCURRENCY() == $currency) {
        $saferpay->payCompleteV2($payConfirmParameter, $payCompleteParameter, $payCompleteResponse);
        echo 'payed!';
    } else {
        $saferpay->payCompleteV2($payConfirmParameter, $payCompleteParameter, $payCompleteResponse, 'CANCEL');
    }
} else {
    $payInitParameter = new PayInitParameter();
    $payInitParameter->setACCOUNTID('99867-94913159');
    $payInitParameter->setAMOUNT($amount);
    $payInitParameter->setCURRENCY($currency);
    $payInitParameter->setDESCRIPTION(sprintf('Bestellnummer: %s', '000001'));
    $payInitParameter->setSUCCESSLINK(requestUrl() . '?status=success');
    $payInitParameter->setFAILLINK(requestUrl() . '?status=fail');
    $payInitParameter->setBACKLINK(requestUrl() . '?status=back');
    $payInitParameter->setDELIVERY('no'); // hide address form
    header("Location: {$saferpay->createPayInit($payInitParameter)}", 302);
}

function requestUrl()
{
    $protocol = strtolower(substr($_SERVER['SERVER_PROTOCOL'], 0, strpos($_SERVER['SERVER_PROTOCOL'], '/')));
    return $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

function getParam($key, $default = null)
{
    return array_key_exists($key, $_GET) ? $_GET[$key] : $default;
}
