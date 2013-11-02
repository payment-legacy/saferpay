<?php

namespace Payment\Saferpay\Data\Billpay;

use Payment\Saferpay\Data\Collection\Collection;

class BillpayPayInitParameterTest extends \PHPUnit_Framework_TestCase
{
    protected $legalForm = BillpayPayInitParameterInterface::LEGALFORM_GMBH;
    protected $addressAddtition = 'Address addition';
    protected $dateOfBirth = '20000101';
    protected $deliveryGender = 'm';
    protected $deliveryFirstname = 'Firstname';
    protected $deliveryLastname = 'Lastname';
    protected $deliveryStreet = 'Street 0';
    protected $deliveryAddressAddtition = 'Delivery address addition';
    protected $deliveryZip = '0000';
    protected $deliveryCity = 'City';
    protected $deliveryCountry = 'CH';
    protected $deliveryPhone = '+00000000000';

    public function testSetterGetterWithValidData()
    {
        $billpayPayInitParameter = new BillpayPayInitParameter;
        $billpayPayInitParameter
            ->setLegalform($this->legalForm)
            ->setAddressAddition($this->addressAddtition)
            ->setDateofBirth($this->dateOfBirth)
            ->setDeliveryGender($this->deliveryGender)
            ->setDeliveryFirstname($this->deliveryFirstname)
            ->setDeliveryLastname($this->deliveryLastname)
            ->setDeliveryStreet($this->deliveryStreet)
            ->setDeliveryAddressAddition($this->deliveryAddressAddtition)
            ->setDeliveryZip($this->deliveryZip)
            ->setDeliveryCity($this->deliveryCity)
            ->setDeliveryCountry($this->deliveryCountry)
            ->setDeliveryPhone($this->deliveryPhone)
        ;

        $this->assertEquals($this->legalForm, $billpayPayInitParameter->getLegalform());
        $this->assertEquals($this->addressAddtition, $billpayPayInitParameter->getAddressAddition());
        $this->assertEquals($this->dateOfBirth, $billpayPayInitParameter->getDateofBirth());
        $this->assertEquals($this->deliveryGender, $billpayPayInitParameter->getDeliveryGender());
        $this->assertEquals($this->deliveryFirstname, $billpayPayInitParameter->getDeliveryFirstname());
        $this->assertEquals($this->deliveryLastname, $billpayPayInitParameter->getDeliveryLastname());
        $this->assertEquals($this->deliveryStreet, $billpayPayInitParameter->getDeliveryStreet());
        $this->assertEquals($this->deliveryAddressAddtition, $billpayPayInitParameter->getDeliveryAddressAddition());
        $this->assertEquals($this->deliveryZip, $billpayPayInitParameter->getDeliveryZip());
        $this->assertEquals($this->deliveryCity, $billpayPayInitParameter->getDeliveryCity());
        $this->assertEquals($this->deliveryCountry, $billpayPayInitParameter->getDeliveryCountry());
        $this->assertEquals($this->deliveryPhone, $billpayPayInitParameter->getDeliveryPhone());

        $this->assertCount(0, $billpayPayInitParameter->getInvalidData());
    }

    public function testSetGetWithValidData()
    {
        $billpayPayInitParameter = new BillpayPayInitParameter;
        $billpayPayInitParameter
            ->set('LEGALFORM', $this->legalForm)
            ->set('ADDRESSADDITION', $this->addressAddtition)
            ->set('DATEOFBIRTH', $this->dateOfBirth)
            ->set('DELIVERY_GENDER', $this->deliveryGender)
            ->set('DELIVERY_FIRSTNAME', $this->deliveryFirstname)
            ->set('DELIVERY_LASTNAME', $this->deliveryLastname)
            ->set('DELIVERY_STREET', $this->deliveryStreet)
            ->set('DELIVERY_ADDRESSADDITION', $this->deliveryAddressAddtition)
            ->set('DELIVERY_ZIP', $this->deliveryZip)
            ->set('DELIVERY_CITY', $this->deliveryCity)
            ->set('DELIVERY_COUNTRY', $this->deliveryCountry)
            ->set('DELIVERY_PHONE', $this->deliveryPhone)
        ;

        $this->assertEquals($this->legalForm, $billpayPayInitParameter->get('LEGALFORM'));
        $this->assertEquals($this->addressAddtition, $billpayPayInitParameter->get('ADDRESSADDITION'));
        $this->assertEquals($this->dateOfBirth, $billpayPayInitParameter->get('DATEOFBIRTH'));
        $this->assertEquals($this->deliveryGender, $billpayPayInitParameter->get('DELIVERY_GENDER'));
        $this->assertEquals($this->deliveryFirstname, $billpayPayInitParameter->get('DELIVERY_FIRSTNAME'));
        $this->assertEquals($this->deliveryLastname, $billpayPayInitParameter->get('DELIVERY_LASTNAME'));
        $this->assertEquals($this->deliveryStreet, $billpayPayInitParameter->get('DELIVERY_STREET'));
        $this->assertEquals($this->deliveryAddressAddtition, $billpayPayInitParameter->get('DELIVERY_ADDRESSADDITION'));
        $this->assertEquals($this->deliveryZip, $billpayPayInitParameter->get('DELIVERY_ZIP'));
        $this->assertEquals($this->deliveryCity, $billpayPayInitParameter->get('DELIVERY_CITY'));
        $this->assertEquals($this->deliveryCountry, $billpayPayInitParameter->get('DELIVERY_COUNTRY'));
        $this->assertEquals($this->deliveryPhone, $billpayPayInitParameter->get('DELIVERY_PHONE'));

        $this->assertCount(0, $billpayPayInitParameter->getInvalidData());
    }

    public function testCollectionWithValidData()
    {
        $billpayPayInitParameter = new BillpayPayInitParameter;

        $payInitParameterCollection = new Collection('');
        $payInitParameterCollection->addCollectionItem($billpayPayInitParameter);

        $payInitParameterCollection
            ->set('GENDER', 'm')
            ->set('LEGALFORM', $this->legalForm)
            ->set('ADDRESSADDITION', $this->addressAddtition)
            ->set('DATEOFBIRTH', $this->dateOfBirth)
            ->set('DELIVERY_GENDER', $this->deliveryGender)
            ->set('DELIVERY_FIRSTNAME', $this->deliveryFirstname)
            ->set('DELIVERY_LASTNAME', $this->deliveryLastname)
            ->set('DELIVERY_STREET', $this->deliveryStreet)
            ->set('DELIVERY_ADDRESSADDITION', $this->deliveryAddressAddtition)
            ->set('DELIVERY_ZIP', $this->deliveryZip)
            ->set('DELIVERY_CITY', $this->deliveryCity)
            ->set('DELIVERY_COUNTRY', $this->deliveryCountry)
            ->set('DELIVERY_PHONE', $this->deliveryPhone)
        ;

        $this->assertEquals($this->legalForm, $payInitParameterCollection->get('LEGALFORM'));
        $this->assertEquals($this->addressAddtition, $payInitParameterCollection->get('ADDRESSADDITION'));
        $this->assertEquals($this->dateOfBirth, $payInitParameterCollection->get('DATEOFBIRTH'));
        $this->assertEquals($this->deliveryGender, $payInitParameterCollection->get('DELIVERY_GENDER'));
        $this->assertEquals($this->deliveryFirstname, $payInitParameterCollection->get('DELIVERY_FIRSTNAME'));
        $this->assertEquals($this->deliveryLastname, $payInitParameterCollection->get('DELIVERY_LASTNAME'));
        $this->assertEquals($this->deliveryStreet, $payInitParameterCollection->get('DELIVERY_STREET'));
        $this->assertEquals($this->deliveryAddressAddtition, $payInitParameterCollection->get('DELIVERY_ADDRESSADDITION'));
        $this->assertEquals($this->deliveryZip, $payInitParameterCollection->get('DELIVERY_ZIP'));
        $this->assertEquals($this->deliveryCity, $payInitParameterCollection->get('DELIVERY_CITY'));
        $this->assertEquals($this->deliveryCountry, $payInitParameterCollection->get('DELIVERY_COUNTRY'));
        $this->assertEquals($this->deliveryPhone, $payInitParameterCollection->get('DELIVERY_PHONE'));

        $this->assertCount(1, $payInitParameterCollection->getInvalidData());
    }
}
