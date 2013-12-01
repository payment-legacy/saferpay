<?php

namespace Payment\Saferpay\Data;

class PayInitParameterTest extends \PHPUnit_Framework_TestCase
{
    const ACCOUNTID = '99867-94913159';
    const AMOUNT = 1200;
    const CURRENCY = 'CHF';
    const DESCRIPTION = 'Test';
    const ORDERID = 'Test with id 1';
    const VTCONFIG = 'config';
    const SUCCESSLINK = 'http://test.lo?status=success';
    const FAILLINK = 'http://test.lo?status=fail';
    const BACKLINK = 'http://test.lo?status=back';
    const NOTIFYURL = 'http://test.lo?status=notify';
    const AUTOCLOSE = 1;
    const CCNAME = 'yes';
    const NOTIFYADDRESS = 'test@test.test';
    const USERNOTIFY = 'test@test.test';
    const LANGID = 'CH';
    const SHOWLANGUAGES = 'yes';
    const PAYMENTMETHODS = 'a:1:{i:0;i:1;}';
    const PROVIDERSET = 'a:1:{i:0;i:1;}';
    const DURATION = 20130701000000;
    const CARDREFID = 'new';
    const DELIVERY = 'no';
    const APPEARANCE = 'auto';
    const ADDRESS = 'BILLING';
    const COMPANY = 'Test Ltd.';
    const GENDER = 'm';
    const FIRSTNAME = 'Firstname';
    const LASTNAME = 'Lastname';
    const STREET = 'Street 0';
    const ZIP = '0000';
    const CITY = 'City';
    const COUNTRY = 'CH';
    const EMAIL = 'test@test.test';
    const PHONE = '+00000000000';
    
    public function testSetterGetterWithValidData()
    {
        $payInitParameter = new PayInitParameter();
        $payInitParameter
            ->setAccountid(self::ACCOUNTID)
            ->setAmount(self::AMOUNT)
            ->setCurrency(self::CURRENCY)
            ->setDescription(self::DESCRIPTION)
            ->setOrderid(self::ORDERID)
            ->setVtconfig(self::VTCONFIG)
            ->setSuccesslink(self::SUCCESSLINK)
            ->setFaillink(self::FAILLINK)
            ->setBacklink(self::BACKLINK)
            ->setNotifyurl(self::NOTIFYURL)
            ->setAutoclose(self::AUTOCLOSE)
            ->setCcname(self::CCNAME)
            ->setNotifyaddress(self::NOTIFYADDRESS)
            ->setUsernotify(self::USERNOTIFY)
            ->setLangid(self::LANGID)
            ->setShowlanguages(self::SHOWLANGUAGES)
            ->setPaymentmethods(unserialize(self::PAYMENTMETHODS))
            ->setProviderset(unserialize(self::PROVIDERSET))
            ->setDuration(self::DURATION)
            ->setCardrefid(self::CARDREFID)
            ->setDelivery(self::DELIVERY)
            ->setAppearance(self::APPEARANCE)
            ->setAddress(self::ADDRESS)
            ->setCompany(self::COMPANY)
            ->setGender(self::GENDER)
            ->setFirstname(self::FIRSTNAME)
            ->setLastname(self::LASTNAME)
            ->setStreet(self::STREET)
            ->setZip(self::ZIP)
            ->setCity(self::CITY)
            ->setCountry(self::COUNTRY)
            ->setEmail(self::EMAIL)
            ->setPhone(self::PHONE)
        ;

        $this->assertEquals(self::ACCOUNTID, $payInitParameter->getAccountid());
        $this->assertEquals(self::AMOUNT, $payInitParameter->getAmount());
        $this->assertEquals(self::CURRENCY, $payInitParameter->getCurrency());
        $this->assertEquals(self::DESCRIPTION, $payInitParameter->getDescription());
        $this->assertEquals(self::ORDERID, $payInitParameter->getOrderid());
        $this->assertEquals(self::VTCONFIG, $payInitParameter->getVtconfig());
        $this->assertEquals(self::SUCCESSLINK, $payInitParameter->getSuccesslink());
        $this->assertEquals(self::FAILLINK, $payInitParameter->getFaillink());
        $this->assertEquals(self::BACKLINK, $payInitParameter->getBacklink());
        $this->assertEquals(self::NOTIFYURL, $payInitParameter->getNotifyurl());
        $this->assertEquals(self::AUTOCLOSE, $payInitParameter->getAutoclose());
        $this->assertEquals(self::CCNAME, $payInitParameter->getCcname());
        $this->assertEquals(self::NOTIFYADDRESS, $payInitParameter->getNotifyaddress());
        $this->assertEquals(self::USERNOTIFY, $payInitParameter->getUsernotify());
        $this->assertEquals(self::LANGID, $payInitParameter->getLangid());
        $this->assertEquals(self::SHOWLANGUAGES, $payInitParameter->getShowlanguages());
        $this->assertEquals(unserialize(self::PAYMENTMETHODS), $payInitParameter->getPaymentmethods());
        $this->assertEquals(unserialize(self::PROVIDERSET), $payInitParameter->getProviderset());
        $this->assertEquals(self::DURATION, $payInitParameter->getDuration());
        $this->assertEquals(self::CARDREFID, $payInitParameter->getCardrefid());
        $this->assertEquals(self::DELIVERY, $payInitParameter->getDelivery());
        $this->assertEquals(self::APPEARANCE, $payInitParameter->getAppearance());
        $this->assertEquals(self::ADDRESS, $payInitParameter->getAddress());
        $this->assertEquals(self::COMPANY, $payInitParameter->getCompany());
        $this->assertEquals(self::GENDER, $payInitParameter->getGender());
        $this->assertEquals(self::FIRSTNAME, $payInitParameter->getFirstname());
        $this->assertEquals(self::LASTNAME, $payInitParameter->getLastname());
        $this->assertEquals(self::STREET, $payInitParameter->getStreet());
        $this->assertEquals(self::ZIP, $payInitParameter->getZip());
        $this->assertEquals(self::CITY, $payInitParameter->getCity());
        $this->assertEquals(self::COUNTRY, $payInitParameter->getCountry());
        $this->assertEquals(self::EMAIL, $payInitParameter->getEmail());
        $this->assertEquals(self::PHONE, $payInitParameter->getPhone());

        $this->assertCount(0, $payInitParameter->getInvalidData());
    }
}
