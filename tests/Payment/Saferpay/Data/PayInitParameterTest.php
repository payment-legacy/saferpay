<?php

namespace Payment\Saferpay\Data;

class PayInitParameterTest extends \PHPUnit_Framework_TestCase
{
    public function testSetterGetterWithValidData()
    {
        $accountId = '99867-94913159';
        $amount = 1200;
        $currency = 'CHF';
        $description = 'Test';
        $orderid = 'Test with id 1';
        $vtconfig = 'config';
        $successLink = 'http://test.lo?status=success';
        $failLink = 'http://test.lo?status=fail';
        $backLink = 'http://test.lo?status=back';
        $notifyUrl = 'http://test.lo?status=notify';
        $autoClose = 1;
        $ccname = 'yes';
        $notifyAddress = 'test@test@test';
        $userNotifiy = 'user@test.test';
        $langId = 'CH';
        $showLanguages = 'yes';
        $paymentMethods = array(
            PayInitParameterInterface::PAYMENTMETHOD_MASTERCARD,
            PayInitParameterInterface::PAYMENTMETHOD_VISA
        );
        $duration = 20130701000000;
        $cardRefId = 'new';
        $delivery = 'no';
        $appearance = 'auto';
        $address = 'BILLING';
        $company = 'Test Ltd.';
        $gender = 'm';
        $firstname = 'Firstname';
        $lastname = 'Lastname';
        $street = 'Street 0';
        $zip = '0000';
        $city = 'City';
        $country = 'CH';
        $email = 'user@test.test';
        $phone = '+00000000000';

        $payInitParameter = new PayInitParameter();
        $payInitParameter
            ->setAccountid($accountId)
            ->setAmount($amount)
            ->setCurrency($currency)
            ->setDescription($description)
            ->setOrderid($orderid)
            ->setVtconfig($vtconfig)
            ->setSuccesslink($successLink)
            ->setFaillink($failLink)
            ->setBacklink($backLink)
            ->setNotifyurl($notifyUrl)
            ->setAutoclose($autoClose)
            ->setCcname($ccname)
            ->setNotifyaddress($notifyAddress)
            ->setUsernotify($userNotifiy)
            ->setLangid($langId)
            ->setShowlanguages($showLanguages)
            ->setPaymentmethods($paymentMethods)
            ->setDuration($duration)
            ->setCardrefid($cardRefId)
            ->setDelivery($delivery)
            ->setAppearance($appearance)
            ->setAddress($address)
            ->setCompany($company)
            ->setGender($gender)
            ->setFirstname($firstname)
            ->setLastname($lastname)
            ->setStreet($street)
            ->setZip($zip)
            ->setCity($city)
            ->setCountry($country)
            ->setEmail($email)
            ->setPhone($phone)
        ;

        $this->assertEquals($accountId, $payInitParameter->getAccountid());
        $this->assertEquals($amount, $payInitParameter->getAmount());
        $this->assertEquals($currency, $payInitParameter->getCurrency());
        $this->assertEquals($description, $payInitParameter->getDescription());
        $this->assertEquals($orderid, $payInitParameter->getOrderid());
        $this->assertEquals($vtconfig, $payInitParameter->getVtconfig());
        $this->assertEquals($successLink, $payInitParameter->getSuccesslink());
        $this->assertEquals($failLink, $payInitParameter->getFaillink());
        $this->assertEquals($backLink, $payInitParameter->getBacklink());
        $this->assertEquals($notifyUrl, $payInitParameter->getNotifyurl());
        $this->assertEquals($autoClose, $payInitParameter->getAutoclose());
        $this->assertEquals($ccname, $payInitParameter->getCcname());
        $this->assertEquals($notifyAddress, $payInitParameter->getNotifyaddress());
        $this->assertEquals($userNotifiy, $payInitParameter->getUsernotify());
        $this->assertEquals($langId, $payInitParameter->getLangid());
        $this->assertEquals($showLanguages, $payInitParameter->getShowlanguages());
        $this->assertEquals($paymentMethods, $payInitParameter->getPaymentmethods());
        $this->assertEquals($duration, $payInitParameter->getDuration());
        $this->assertEquals($cardRefId, $payInitParameter->getCardrefid());
        $this->assertEquals($delivery, $payInitParameter->getDelivery());
        $this->assertEquals($appearance, $payInitParameter->getAppearance());
        $this->assertEquals($address, $payInitParameter->getAddress());
        $this->assertEquals($company, $payInitParameter->getCompany());
        $this->assertEquals($gender, $payInitParameter->getGender());
        $this->assertEquals($firstname, $payInitParameter->getFirstname());
        $this->assertEquals($lastname, $payInitParameter->getLastname());
        $this->assertEquals($street, $payInitParameter->getStreet());
        $this->assertEquals($zip, $payInitParameter->getZip());
        $this->assertEquals($city, $payInitParameter->getCity());
        $this->assertEquals($country, $payInitParameter->getCountry());
        $this->assertEquals($email, $payInitParameter->getEmail());
        $this->assertEquals($phone, $payInitParameter->getPhone());

        $this->assertCount(0, $payInitParameter->getInvalidData());
    }
}
