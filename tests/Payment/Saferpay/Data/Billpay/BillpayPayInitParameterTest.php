<?php

namespace Payment\Saferpay\Data\Billpay;

use Payment\Saferpay\Data\Collection\Collection;
use Payment\Saferpay\Data\PayInitParameterInterface;

class BillpayPayInitParameterTest extends \PHPUnit_Framework_TestCase
{
    const LEGALFORM = BillpayPayInitParameterInterface::LEGALFORM_GMBH;
    const ADDRESSADDITION = 'Address addition';
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
        $billpayPayInitParameter = new BillpayPayInitParameter;
        $billpayPayInitParameter
            ->setLegalform(self::LEGALFORM)
            ->setAddressAddition(self::ADDRESSADDITION)
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

        $this->assertEquals(self::LEGALFORM, $billpayPayInitParameter->getLegalform());
        $this->assertEquals(self::ADDRESSADDITION, $billpayPayInitParameter->getAddressAddition());
        $this->assertEquals(self::DATEOFBIRTH, $billpayPayInitParameter->getDateofBirth());
        $this->assertEquals(self::DELIVERY_GENDER, $billpayPayInitParameter->getDeliveryGender());
        $this->assertEquals(self::DELIVERY_FIRSTNAME, $billpayPayInitParameter->getDeliveryFirstname());
        $this->assertEquals(self::DELIVERY_LASTNAME, $billpayPayInitParameter->getDeliveryLastname());
        $this->assertEquals(self::DELIVERY_STREET, $billpayPayInitParameter->getDeliveryStreet());
        $this->assertEquals(self::DELIVERY_ADDRESSADDITION, $billpayPayInitParameter->getDeliveryAddressAddition());
        $this->assertEquals(self::DELIVERY_ZIP, $billpayPayInitParameter->getDeliveryZip());
        $this->assertEquals(self::DELIVERY_CITY, $billpayPayInitParameter->getDeliveryCity());
        $this->assertEquals(self::DELIVERY_COUNTRY, $billpayPayInitParameter->getDeliveryCountry());
        $this->assertEquals(self::DELIVERY_PHONE, $billpayPayInitParameter->getDeliveryPhone());

        $this->assertCount(0, $billpayPayInitParameter->getInvalidData());
    }

    public function testSetGetWithValidData()
    {
        $billpayPayInitParameter = new BillpayPayInitParameter;
        $billpayPayInitParameter
            ->set('LEGALFORM', self::LEGALFORM)
            ->set('ADDRESSADDITION', self::ADDRESSADDITION)
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

        $this->assertEquals(self::LEGALFORM, $billpayPayInitParameter->get('LEGALFORM'));
        $this->assertEquals(self::ADDRESSADDITION, $billpayPayInitParameter->get('ADDRESSADDITION'));
        $this->assertEquals(self::DATEOFBIRTH, $billpayPayInitParameter->get('DATEOFBIRTH'));
        $this->assertEquals(self::DELIVERY_GENDER, $billpayPayInitParameter->get('DELIVERY_GENDER'));
        $this->assertEquals(self::DELIVERY_FIRSTNAME, $billpayPayInitParameter->get('DELIVERY_FIRSTNAME'));
        $this->assertEquals(self::DELIVERY_LASTNAME, $billpayPayInitParameter->get('DELIVERY_LASTNAME'));
        $this->assertEquals(self::DELIVERY_STREET, $billpayPayInitParameter->get('DELIVERY_STREET'));
        $this->assertEquals(self::DELIVERY_ADDRESSADDITION, $billpayPayInitParameter->get('DELIVERY_ADDRESSADDITION'));
        $this->assertEquals(self::DELIVERY_ZIP, $billpayPayInitParameter->get('DELIVERY_ZIP'));
        $this->assertEquals(self::DELIVERY_CITY, $billpayPayInitParameter->get('DELIVERY_CITY'));
        $this->assertEquals(self::DELIVERY_COUNTRY, $billpayPayInitParameter->get('DELIVERY_COUNTRY'));
        $this->assertEquals(self::DELIVERY_PHONE, $billpayPayInitParameter->get('DELIVERY_PHONE'));

        $this->assertCount(0, $billpayPayInitParameter->getInvalidData());
    }

    public function testCollectionWithValidData()
    {
        $billpayPayInitParameter = new BillpayPayInitParameter;

        $payInitParameterCollection = new Collection('');
        $payInitParameterCollection->addCollectionItem($billpayPayInitParameter);

        $payInitParameterCollection
            ->set('LEGALFORM', self::LEGALFORM)
            ->set('ADDRESSADDITION', self::ADDRESSADDITION)
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

        $this->assertEquals(self::LEGALFORM, $payInitParameterCollection->get('LEGALFORM'));
        $this->assertEquals(self::ADDRESSADDITION, $payInitParameterCollection->get('ADDRESSADDITION'));
        $this->assertEquals(self::DATEOFBIRTH, $payInitParameterCollection->get('DATEOFBIRTH'));
        $this->assertEquals(self::DELIVERY_GENDER, $payInitParameterCollection->get('DELIVERY_GENDER'));
        $this->assertEquals(self::DELIVERY_FIRSTNAME, $payInitParameterCollection->get('DELIVERY_FIRSTNAME'));
        $this->assertEquals(self::DELIVERY_LASTNAME, $payInitParameterCollection->get('DELIVERY_LASTNAME'));
        $this->assertEquals(self::DELIVERY_STREET, $payInitParameterCollection->get('DELIVERY_STREET'));
        $this->assertEquals(self::DELIVERY_ADDRESSADDITION, $payInitParameterCollection->get('DELIVERY_ADDRESSADDITION'));
        $this->assertEquals(self::DELIVERY_ZIP, $payInitParameterCollection->get('DELIVERY_ZIP'));
        $this->assertEquals(self::DELIVERY_CITY, $payInitParameterCollection->get('DELIVERY_CITY'));
        $this->assertEquals(self::DELIVERY_COUNTRY, $payInitParameterCollection->get('DELIVERY_COUNTRY'));
        $this->assertEquals(self::DELIVERY_PHONE, $payInitParameterCollection->get('DELIVERY_PHONE'));

        $this->assertCount(0, $payInitParameterCollection->getInvalidData());
    }
}
