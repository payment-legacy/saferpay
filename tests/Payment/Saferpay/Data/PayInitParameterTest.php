<?php

namespace Payment\Saferpay\Data;

use Payment\Saferpay\Data\Collection\Collection;

class PayInitParameterTest extends \PHPUnit_Framework_TestCase
{
    const ACCOUNTID = '99867-94913159';
    const AMOUNT = 1200;
    const CSSURL = 'http://test.lo/test.css';
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
    const GENDER = PayInitParameterInterface::GENDER_MALE;
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
            ->setCssurl(self::CSSURL)
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
        $this->assertEquals(self::CSSURL, $payInitParameter->getCssurl());
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

    public function testSetGetWithValidData()
    {
        $payInitParameter = new PayInitParameter();
        $payInitParameter
            ->set('ACCOUNTID', self::ACCOUNTID)
            ->set('AMOUNT', self::AMOUNT)
            ->set('CURRENCY', self::CURRENCY)
            ->set('DESCRIPTION', self::DESCRIPTION)
            ->set('ORDERID', self::ORDERID)
            ->set('VTCONFIG', self::VTCONFIG)
            ->set('SUCCESSLINK', self::SUCCESSLINK)
            ->set('FAILLINK', self::FAILLINK)
            ->set('BACKLINK', self::BACKLINK)
            ->set('NOTIFYURL', self::NOTIFYURL)
            ->set('AUTOCLOSE', self::AUTOCLOSE)
            ->set('CCNAME', self::CCNAME)
            ->set('NOTIFYADDRESS', self::NOTIFYADDRESS)
            ->set('USERNOTIFY', self::USERNOTIFY)
            ->set('LANGID', self::LANGID)
            ->set('SHOWLANGUAGES', self::SHOWLANGUAGES)
            ->set('PAYMENTMETHODS', 1)
            ->set('PROVIDERSET', 1)
            ->set('DURATION', self::DURATION)
            ->set('CARDREFID', self::CARDREFID)
            ->set('DELIVERY', self::DELIVERY)
            ->set('APPEARANCE', self::APPEARANCE)
            ->set('ADDRESS', self::ADDRESS)
            ->set('COMPANY', self::COMPANY)
            ->set('GENDER', self::GENDER)
            ->set('FIRSTNAME', self::FIRSTNAME)
            ->set('LASTNAME', self::LASTNAME)
            ->set('STREET', self::STREET)
            ->set('ZIP', self::ZIP)
            ->set('CITY', self::CITY)
            ->set('COUNTRY', self::COUNTRY)
            ->set('EMAIL', self::EMAIL)
            ->set('PHONE', self::PHONE)
        ;

        $this->assertEquals(self::ACCOUNTID, $payInitParameter->get('ACCOUNTID'));
        $this->assertEquals(self::AMOUNT, $payInitParameter->get('AMOUNT'));
        $this->assertEquals(self::CURRENCY, $payInitParameter->get('CURRENCY'));
        $this->assertEquals(self::DESCRIPTION, $payInitParameter->get('DESCRIPTION'));
        $this->assertEquals(self::ORDERID, $payInitParameter->get('ORDERID'));
        $this->assertEquals(self::VTCONFIG, $payInitParameter->get('VTCONFIG'));
        $this->assertEquals(self::SUCCESSLINK, $payInitParameter->get('SUCCESSLINK'));
        $this->assertEquals(self::FAILLINK, $payInitParameter->get('FAILLINK'));
        $this->assertEquals(self::BACKLINK, $payInitParameter->get('BACKLINK'));
        $this->assertEquals(self::NOTIFYURL, $payInitParameter->get('NOTIFYURL'));
        $this->assertEquals(self::AUTOCLOSE, $payInitParameter->get('AUTOCLOSE'));
        $this->assertEquals(self::CCNAME, $payInitParameter->get('CCNAME'));
        $this->assertEquals(self::NOTIFYADDRESS, $payInitParameter->get('NOTIFYADDRESS'));
        $this->assertEquals(self::USERNOTIFY, $payInitParameter->get('USERNOTIFY'));
        $this->assertEquals(self::LANGID, $payInitParameter->get('LANGID'));
        $this->assertEquals(self::SHOWLANGUAGES, $payInitParameter->get('SHOWLANGUAGES'));
        $this->assertEquals(1, $payInitParameter->get('PAYMENTMETHODS'));
        $this->assertEquals(1, $payInitParameter->get('PROVIDERSET'));
        $this->assertEquals(self::DURATION, $payInitParameter->get('DURATION'));
        $this->assertEquals(self::CARDREFID, $payInitParameter->get('CARDREFID'));
        $this->assertEquals(self::DELIVERY, $payInitParameter->get('DELIVERY'));
        $this->assertEquals(self::APPEARANCE, $payInitParameter->get('APPEARANCE'));
        $this->assertEquals(self::ADDRESS, $payInitParameter->get('ADDRESS'));
        $this->assertEquals(self::COMPANY, $payInitParameter->get('COMPANY'));
        $this->assertEquals(self::GENDER, $payInitParameter->get('GENDER'));
        $this->assertEquals(self::FIRSTNAME, $payInitParameter->get('FIRSTNAME'));
        $this->assertEquals(self::LASTNAME, $payInitParameter->get('LASTNAME'));
        $this->assertEquals(self::STREET, $payInitParameter->get('STREET'));
        $this->assertEquals(self::ZIP, $payInitParameter->get('ZIP'));
        $this->assertEquals(self::CITY, $payInitParameter->get('CITY'));
        $this->assertEquals(self::COUNTRY, $payInitParameter->get('COUNTRY'));
        $this->assertEquals(self::EMAIL, $payInitParameter->get('EMAIL'));
        $this->assertEquals(self::PHONE, $payInitParameter->get('PHONE'));

        $this->assertCount(0, $payInitParameter->getInvalidData());
    }

    public function testCollectionWithValidData()
    {
        $payInitParameter = new PayInitParameter;

        $payInitParameterCollection = new Collection('');
        $payInitParameterCollection->addCollectionItem($payInitParameter);

        $payInitParameterCollection
            ->set('ACCOUNTID', self::ACCOUNTID)
            ->set('AMOUNT', self::AMOUNT)
            ->set('CURRENCY', self::CURRENCY)
            ->set('DESCRIPTION', self::DESCRIPTION)
            ->set('ORDERID', self::ORDERID)
            ->set('VTCONFIG', self::VTCONFIG)
            ->set('SUCCESSLINK', self::SUCCESSLINK)
            ->set('FAILLINK', self::FAILLINK)
            ->set('BACKLINK', self::BACKLINK)
            ->set('NOTIFYURL', self::NOTIFYURL)
            ->set('AUTOCLOSE', self::AUTOCLOSE)
            ->set('CCNAME', self::CCNAME)
            ->set('NOTIFYADDRESS', self::NOTIFYADDRESS)
            ->set('USERNOTIFY', self::USERNOTIFY)
            ->set('LANGID', self::LANGID)
            ->set('SHOWLANGUAGES', self::SHOWLANGUAGES)
            ->set('PAYMENTMETHODS', 1)
            ->set('PROVIDERSET', 1)
            ->set('DURATION', self::DURATION)
            ->set('CARDREFID', self::CARDREFID)
            ->set('DELIVERY', self::DELIVERY)
            ->set('APPEARANCE', self::APPEARANCE)
            ->set('ADDRESS', self::ADDRESS)
            ->set('COMPANY', self::COMPANY)
            ->set('GENDER', self::GENDER)
            ->set('FIRSTNAME', self::FIRSTNAME)
            ->set('LASTNAME', self::LASTNAME)
            ->set('STREET', self::STREET)
            ->set('ZIP', self::ZIP)
            ->set('CITY', self::CITY)
            ->set('COUNTRY', self::COUNTRY)
            ->set('EMAIL', self::EMAIL)
            ->set('PHONE', self::PHONE)
        ;

        $this->assertEquals(self::ACCOUNTID, $payInitParameterCollection->get('ACCOUNTID'));
        $this->assertEquals(self::AMOUNT, $payInitParameterCollection->get('AMOUNT'));
        $this->assertEquals(self::CURRENCY, $payInitParameterCollection->get('CURRENCY'));
        $this->assertEquals(self::DESCRIPTION, $payInitParameterCollection->get('DESCRIPTION'));
        $this->assertEquals(self::ORDERID, $payInitParameterCollection->get('ORDERID'));
        $this->assertEquals(self::VTCONFIG, $payInitParameterCollection->get('VTCONFIG'));
        $this->assertEquals(self::SUCCESSLINK, $payInitParameterCollection->get('SUCCESSLINK'));
        $this->assertEquals(self::FAILLINK, $payInitParameterCollection->get('FAILLINK'));
        $this->assertEquals(self::BACKLINK, $payInitParameterCollection->get('BACKLINK'));
        $this->assertEquals(self::NOTIFYURL, $payInitParameterCollection->get('NOTIFYURL'));
        $this->assertEquals(self::AUTOCLOSE, $payInitParameterCollection->get('AUTOCLOSE'));
        $this->assertEquals(self::CCNAME, $payInitParameterCollection->get('CCNAME'));
        $this->assertEquals(self::NOTIFYADDRESS, $payInitParameterCollection->get('NOTIFYADDRESS'));
        $this->assertEquals(self::USERNOTIFY, $payInitParameterCollection->get('USERNOTIFY'));
        $this->assertEquals(self::LANGID, $payInitParameterCollection->get('LANGID'));
        $this->assertEquals(self::SHOWLANGUAGES, $payInitParameterCollection->get('SHOWLANGUAGES'));
        $this->assertEquals(1, $payInitParameterCollection->get('PAYMENTMETHODS'));
        $this->assertEquals(1, $payInitParameterCollection->get('PROVIDERSET'));
        $this->assertEquals(self::DURATION, $payInitParameterCollection->get('DURATION'));
        $this->assertEquals(self::CARDREFID, $payInitParameterCollection->get('CARDREFID'));
        $this->assertEquals(self::DELIVERY, $payInitParameterCollection->get('DELIVERY'));
        $this->assertEquals(self::APPEARANCE, $payInitParameterCollection->get('APPEARANCE'));
        $this->assertEquals(self::ADDRESS, $payInitParameterCollection->get('ADDRESS'));
        $this->assertEquals(self::COMPANY, $payInitParameterCollection->get('COMPANY'));
        $this->assertEquals(self::GENDER, $payInitParameterCollection->get('GENDER'));
        $this->assertEquals(self::FIRSTNAME, $payInitParameterCollection->get('FIRSTNAME'));
        $this->assertEquals(self::LASTNAME, $payInitParameterCollection->get('LASTNAME'));
        $this->assertEquals(self::STREET, $payInitParameterCollection->get('STREET'));
        $this->assertEquals(self::ZIP, $payInitParameterCollection->get('ZIP'));
        $this->assertEquals(self::CITY, $payInitParameterCollection->get('CITY'));
        $this->assertEquals(self::COUNTRY, $payInitParameterCollection->get('COUNTRY'));
        $this->assertEquals(self::EMAIL, $payInitParameterCollection->get('EMAIL'));
        $this->assertEquals(self::PHONE, $payInitParameterCollection->get('PHONE'));
    }
}
