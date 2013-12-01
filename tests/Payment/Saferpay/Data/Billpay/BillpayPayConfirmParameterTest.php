<?php

namespace Payment\Saferpay\Data\Billpay;

use Payment\Saferpay\Data\Collection\Collection;
use Payment\Saferpay\Data\PayInitParameterInterface;

class BillpayPayConfirmParameterTest extends \PHPUnit_Framework_TestCase
{
    const COMPANY = 'Company';
    const LEGALFORM = BillpayPayInitParameterInterface::LEGALFORM_GMBH;
    const GENDER = PayInitParameterInterface::GENDER_MALE;
    const FIRSTNAME = 'Firstname';
    const LASTNAME = 'Lastname';
    const STREET = 'Street 0';
    const ADDRESSADDITION = 'Address addition';
    const ZIP = '0000';
    const CITY = 'City';
    const COUNTRY = 'CH';
    const EMAIL = 'test@test.test';
    const PHONE = '+00000000000';
    const DATEOFBIRTH = '20000101';
    const DELIVERY_GENDER = PayInitParameterInterface::GENDER_MALE;
    const DELIVERY_FIRSTNAME = 'Firstname';
    const DELIVERY_LASTNAME = 'Lastname';
    const DELIVERY_STREET = 'Street 0';
    const DELIVERY_ADDRESSADDITION = 'Delivery address addition';
    const DELIVERY_ZIP = '0000';
    const DELIVERY_CITY = 'City';
    const DELIVERY_COUNTRY = 'CH';
    const DELIVERY_PHONE = '+00000000000';

    public function testSetterGetterWithValidData()
    {
        $billpayPayConfirmParameter = new BillpayPayConfirmParameter;
        $billpayPayConfirmParameter
            ->setCompany(self::COMPANY)
            ->setLegalform(self::LEGALFORM)
            ->setGender(self::GENDER)
            ->setFirstname(self::FIRSTNAME)
            ->setLastname(self::LASTNAME)
            ->setStreet(self::STREET)
            ->setAddressAddition(self::ADDRESSADDITION)
            ->setZip(self::ZIP)
            ->setCity(self::CITY)
            ->setCountry(self::COUNTRY)
            ->setEmail(self::EMAIL)
            ->setPhone(self::PHONE)
            ->setDateofBirth(self::DATEOFBIRTH)
            ->setDeliveryGender(self::DELIVERY_GENDER)
            ->setDeliveryFirstname(self::DELIVERY_FIRSTNAME)
            ->setDeliveryLastname(self::DELIVERY_LASTNAME)
            ->setDeliveryStreet(self::DELIVERY_STREET)
            ->setDeliveryAddressAddition(self::DELIVERY_ADDRESSADDITION)
            ->setDeliveryZip(self::DELIVERY_ZIP)
            ->setDeliveryCity(self::DELIVERY_CITY)
            ->setDeliveryCountry(self::DELIVERY_COUNTRY)
            ->setDeliveryPhone(self::DELIVERY_PHONE)
        ;

        $this->assertEquals(self::COMPANY, $billpayPayConfirmParameter->getCompany());
        $this->assertEquals(self::LEGALFORM, $billpayPayConfirmParameter->getLegalform());
        $this->assertEquals(self::GENDER, $billpayPayConfirmParameter->getGender());
        $this->assertEquals(self::FIRSTNAME, $billpayPayConfirmParameter->getFirstname());
        $this->assertEquals(self::LASTNAME, $billpayPayConfirmParameter->getLastname());
        $this->assertEquals(self::STREET, $billpayPayConfirmParameter->getStreet());
        $this->assertEquals(self::ADDRESSADDITION, $billpayPayConfirmParameter->getAddressAddition());
        $this->assertEquals(self::ZIP, $billpayPayConfirmParameter->getZip());
        $this->assertEquals(self::CITY, $billpayPayConfirmParameter->getCity());
        $this->assertEquals(self::COUNTRY, $billpayPayConfirmParameter->getCountry());
        $this->assertEquals(self::EMAIL, $billpayPayConfirmParameter->getEmail());
        $this->assertEquals(self::PHONE, $billpayPayConfirmParameter->getPhone());
        $this->assertEquals(self::DATEOFBIRTH, $billpayPayConfirmParameter->getDateofBirth());
        $this->assertEquals(self::DELIVERY_GENDER, $billpayPayConfirmParameter->getDeliveryGender());
        $this->assertEquals(self::DELIVERY_FIRSTNAME, $billpayPayConfirmParameter->getDeliveryFirstname());
        $this->assertEquals(self::DELIVERY_LASTNAME, $billpayPayConfirmParameter->getDeliveryLastname());
        $this->assertEquals(self::DELIVERY_STREET, $billpayPayConfirmParameter->getDeliveryStreet());
        $this->assertEquals(self::DELIVERY_ADDRESSADDITION, $billpayPayConfirmParameter->getDeliveryAddressAddition());
        $this->assertEquals(self::DELIVERY_ZIP, $billpayPayConfirmParameter->getDeliveryZip());
        $this->assertEquals(self::DELIVERY_CITY, $billpayPayConfirmParameter->getDeliveryCity());
        $this->assertEquals(self::DELIVERY_COUNTRY, $billpayPayConfirmParameter->getDeliveryCountry());
        $this->assertEquals(self::DELIVERY_PHONE, $billpayPayConfirmParameter->getDeliveryPhone());

        $this->assertCount(0, $billpayPayConfirmParameter->getInvalidData());
    }

    public function testSetGetWithValidData()
    {
        $billpayPayConfirmParameter = new BillpayPayConfirmParameter;
        $billpayPayConfirmParameter
            ->set('COMPANY', self::COMPANY)
            ->set('LEGALFORM', self::LEGALFORM)
            ->set('GENDER', self::GENDER)
            ->set('FIRSTNAME', self::FIRSTNAME)
            ->set('LASTNAME', self::LASTNAME)
            ->set('STREET', self::STREET)
            ->set('ADDRESSADDITION', self::ADDRESSADDITION)
            ->set('ZIP', self::ZIP)
            ->set('CITY', self::CITY)
            ->set('COUNTRY', self::COUNTRY)
            ->set('EMAIL', self::EMAIL)
            ->set('PHONE', self::PHONE)
            ->set('DATEOFBIRTH', self::DATEOFBIRTH)
            ->set('DELIVERY_GENDER', self::DELIVERY_GENDER)
            ->set('DELIVERY_FIRSTNAME', self::DELIVERY_FIRSTNAME)
            ->set('DELIVERY_LASTNAME', self::DELIVERY_LASTNAME)
            ->set('DELIVERY_STREET', self::DELIVERY_STREET)
            ->set('DELIVERY_ADDRESSADDITION', self::DELIVERY_ADDRESSADDITION)
            ->set('DELIVERY_ZIP', self::DELIVERY_ZIP)
            ->set('DELIVERY_CITY', self::DELIVERY_CITY)
            ->set('DELIVERY_COUNTRY', self::DELIVERY_COUNTRY)
            ->set('DELIVERY_PHONE', self::DELIVERY_PHONE)
        ;

        $this->assertEquals(self::COMPANY, $billpayPayConfirmParameter->get('COMPANY'));
        $this->assertEquals(self::LEGALFORM, $billpayPayConfirmParameter->get('LEGALFORM'));
        $this->assertEquals(self::GENDER, $billpayPayConfirmParameter->get('GENDER'));
        $this->assertEquals(self::FIRSTNAME, $billpayPayConfirmParameter->get('FIRSTNAME'));
        $this->assertEquals(self::LASTNAME, $billpayPayConfirmParameter->get('LASTNAME'));
        $this->assertEquals(self::STREET, $billpayPayConfirmParameter->get('STREET'));
        $this->assertEquals(self::ADDRESSADDITION, $billpayPayConfirmParameter->get('ADDRESSADDITION'));
        $this->assertEquals(self::ZIP, $billpayPayConfirmParameter->get('ZIP'));
        $this->assertEquals(self::CITY, $billpayPayConfirmParameter->get('CITY'));
        $this->assertEquals(self::COUNTRY, $billpayPayConfirmParameter->get('COUNTRY'));
        $this->assertEquals(self::EMAIL, $billpayPayConfirmParameter->get('EMAIL'));
        $this->assertEquals(self::PHONE, $billpayPayConfirmParameter->get('PHONE'));
        $this->assertEquals(self::DATEOFBIRTH, $billpayPayConfirmParameter->get('DATEOFBIRTH'));
        $this->assertEquals(self::DELIVERY_GENDER, $billpayPayConfirmParameter->get('DELIVERY_GENDER'));
        $this->assertEquals(self::DELIVERY_FIRSTNAME, $billpayPayConfirmParameter->get('DELIVERY_FIRSTNAME'));
        $this->assertEquals(self::DELIVERY_LASTNAME, $billpayPayConfirmParameter->get('DELIVERY_LASTNAME'));
        $this->assertEquals(self::DELIVERY_STREET, $billpayPayConfirmParameter->get('DELIVERY_STREET'));
        $this->assertEquals(self::DELIVERY_ADDRESSADDITION, $billpayPayConfirmParameter->get('DELIVERY_ADDRESSADDITION'));
        $this->assertEquals(self::DELIVERY_ZIP, $billpayPayConfirmParameter->get('DELIVERY_ZIP'));
        $this->assertEquals(self::DELIVERY_CITY, $billpayPayConfirmParameter->get('DELIVERY_CITY'));
        $this->assertEquals(self::DELIVERY_COUNTRY, $billpayPayConfirmParameter->get('DELIVERY_COUNTRY'));
        $this->assertEquals(self::DELIVERY_PHONE, $billpayPayConfirmParameter->get('DELIVERY_PHONE'));

        $this->assertCount(0, $billpayPayConfirmParameter->getInvalidData());
    }

    public function testCollectionWithValidData()
    {
        $billpayPayConfirmParameter = new BillpayPayConfirmParameter;

        $payConfirmParameterCollection = new Collection('');
        $payConfirmParameterCollection->addCollectionItem($billpayPayConfirmParameter);

        $payConfirmParameterCollection
            ->set('COMPANY', self::COMPANY)
            ->set('LEGALFORM', self::LEGALFORM)
            ->set('GENDER', self::GENDER)
            ->set('FIRSTNAME', self::FIRSTNAME)
            ->set('LASTNAME', self::LASTNAME)
            ->set('STREET', self::STREET)
            ->set('ADDRESSADDITION', self::ADDRESSADDITION)
            ->set('ZIP', self::ZIP)
            ->set('CITY', self::CITY)
            ->set('COUNTRY', self::COUNTRY)
            ->set('EMAIL', self::EMAIL)
            ->set('PHONE', self::PHONE)
            ->set('DATEOFBIRTH', self::DATEOFBIRTH)
            ->set('DELIVERY_GENDER', self::DELIVERY_GENDER)
            ->set('DELIVERY_FIRSTNAME', self::DELIVERY_FIRSTNAME)
            ->set('DELIVERY_LASTNAME', self::DELIVERY_LASTNAME)
            ->set('DELIVERY_STREET', self::DELIVERY_STREET)
            ->set('DELIVERY_ADDRESSADDITION', self::DELIVERY_ADDRESSADDITION)
            ->set('DELIVERY_ZIP', self::DELIVERY_ZIP)
            ->set('DELIVERY_CITY', self::DELIVERY_CITY)
            ->set('DELIVERY_COUNTRY', self::DELIVERY_COUNTRY)
            ->set('DELIVERY_PHONE', self::DELIVERY_PHONE)
        ;

        $this->assertEquals(self::COMPANY, $billpayPayConfirmParameter->get('COMPANY'));
        $this->assertEquals(self::LEGALFORM, $billpayPayConfirmParameter->get('LEGALFORM'));
        $this->assertEquals(self::GENDER, $billpayPayConfirmParameter->get('GENDER'));
        $this->assertEquals(self::FIRSTNAME, $billpayPayConfirmParameter->get('FIRSTNAME'));
        $this->assertEquals(self::LASTNAME, $billpayPayConfirmParameter->get('LASTNAME'));
        $this->assertEquals(self::STREET, $billpayPayConfirmParameter->get('STREET'));
        $this->assertEquals(self::ADDRESSADDITION, $billpayPayConfirmParameter->get('ADDRESSADDITION'));
        $this->assertEquals(self::ZIP, $billpayPayConfirmParameter->get('ZIP'));
        $this->assertEquals(self::CITY, $billpayPayConfirmParameter->get('CITY'));
        $this->assertEquals(self::COUNTRY, $billpayPayConfirmParameter->get('COUNTRY'));
        $this->assertEquals(self::EMAIL, $billpayPayConfirmParameter->get('EMAIL'));
        $this->assertEquals(self::PHONE, $billpayPayConfirmParameter->get('PHONE'));
        $this->assertEquals(self::DATEOFBIRTH, $billpayPayConfirmParameter->get('DATEOFBIRTH'));
        $this->assertEquals(self::DELIVERY_GENDER, $billpayPayConfirmParameter->get('DELIVERY_GENDER'));
        $this->assertEquals(self::DELIVERY_FIRSTNAME, $billpayPayConfirmParameter->get('DELIVERY_FIRSTNAME'));
        $this->assertEquals(self::DELIVERY_LASTNAME, $billpayPayConfirmParameter->get('DELIVERY_LASTNAME'));
        $this->assertEquals(self::DELIVERY_STREET, $billpayPayConfirmParameter->get('DELIVERY_STREET'));
        $this->assertEquals(self::DELIVERY_ADDRESSADDITION, $billpayPayConfirmParameter->get('DELIVERY_ADDRESSADDITION'));
        $this->assertEquals(self::DELIVERY_ZIP, $billpayPayConfirmParameter->get('DELIVERY_ZIP'));
        $this->assertEquals(self::DELIVERY_CITY, $billpayPayConfirmParameter->get('DELIVERY_CITY'));
        $this->assertEquals(self::DELIVERY_COUNTRY, $billpayPayConfirmParameter->get('DELIVERY_COUNTRY'));
        $this->assertEquals(self::DELIVERY_PHONE, $billpayPayConfirmParameter->get('DELIVERY_PHONE'));

        $this->assertCount(0, $payConfirmParameterCollection->getInvalidData());
    }
}
