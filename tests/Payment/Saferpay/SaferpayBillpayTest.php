<?php

namespace Payment\Saferpay;

use Payment\HttpClient\BuzzClient;
use Payment\Saferpay\Data\Billpay\BillpayPayInitParameter;
use Payment\Saferpay\Data\Billpay\BillpayPayInitParameterInterface;
use Payment\Saferpay\Data\Collection\Collection;
use Payment\Saferpay\Data\PayInitParameter;
use Payment\Saferpay\Data\PayInitParameterInterface;

class SaferpayBillpayTest extends \PHPUnit_Framework_TestCase
{
    public function testCreatePayInit()
    {
        $saferpay = new Saferpay();
        $saferpay->setHttpClient(new BuzzClient());

        $payInitParameter = new PayInitParameter();
        $payInitParameter->setAccountid('99867-94913159');
        $payInitParameter->setAmount(1200);
        $payInitParameter->setCurrency('CHF');
        $payInitParameter->setDescription(sprintf('Ordernumber: %s', '000001'));
        $payInitParameter->setOrderid(1);
        $payInitParameter->setSuccesslink('http://test.lo?status=success');
        $payInitParameter->setFaillink('http://test.lo?status=fail');
        $payInitParameter->setBacklink('http://test.lo?status=back');
        $payInitParameter->setProviderset(array(BillpayPayInitParameterInterface::PROVIDERSET_BILLPAY_INVOICE));
        $payInitParameter->setGender(PayInitParameterInterface::GENDER_COMPANY);
        $payInitParameter->setFirstname('John');
        $payInitParameter->setLastname('Doe');
        $payInitParameter->setStreet('Samplestreet 0');
        $payInitParameter->setZip('00000');
        $payInitParameter->setCity('Samplecity');
        $payInitParameter->setCountry('US');
        $payInitParameter->setLangid('EN');
        $payInitParameter->setPhone('+10000000000');
        $payInitParameter->setEmail('john.doe@somedomain.tld');

        $billpayPayInitParameter = new BillpayPayInitParameter();
        $billpayPayInitParameter->setLegalform(BillpayPayInitParameterInterface::LEGALFORM_MISC);
        $billpayPayInitParameter->setDeliveryGender(PayInitParameterInterface::GENDER_COMPANY);
        $billpayPayInitParameter->setDeliveryFirstname('John');
        $billpayPayInitParameter->setDeliveryLastname('Doe');
        $billpayPayInitParameter->setDeliveryStreet('Samplestreet 0');
        $billpayPayInitParameter->setDeliveryZip('00000');
        $billpayPayInitParameter->setDeliveryCity('Samplecity');
        $billpayPayInitParameter->setDeliveryCountry('US');
        $billpayPayInitParameter->setDeliveryPhone('+10000000000');

        $payInitParameterCollection = new Collection($payInitParameter->getRequestUrl());
        $payInitParameterCollection->addCollectionItem($payInitParameter);
        $payInitParameterCollection->addCollectionItem($billpayPayInitParameter);

        $url = $saferpay->createPayInit($payInitParameterCollection);

        $this->assertStringStartsWith('https://www.saferpay.com/vt2/Pay.aspx', $url);

    }
}
