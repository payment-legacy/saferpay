<?php

namespace Payment\Saferpay\Data;

use Payment\Saferpay\Data\Collection\Collection;

class PayCompleteParameterTest extends \PHPUnit_Framework_TestCase
{
    const ID = 'WxWrIlA48W06rAjKKOp5bzS80E5A';
    const AMOUNT = '1200';
    const ACCOUNTID = '99867-94913159';
    const ACTION = PayCompleteParameterInterface::ACTION_SETTLEMENT;

    public function testSetterGetterWithValidData()
    {
        $payCompleteParameter = new PayCompleteParameter();
        $payCompleteParameter
            ->setId(self::ID)
            ->setAmount(self::AMOUNT)
            ->setAccountid(self::ACCOUNTID)
            ->setAction(self::ACTION)
        ;

        $this->assertEquals(self::ID, $payCompleteParameter->getId());
        $this->assertEquals(self::AMOUNT, $payCompleteParameter->getAmount());
        $this->assertEquals(self::ACCOUNTID, $payCompleteParameter->getAccountid());
        $this->assertEquals(self::ACTION, $payCompleteParameter->getAction());

        $this->assertCount(0, $payCompleteParameter->getInvalidData());
    }

    public function testSetGetWithValidData()
    {
        $payCompleteParameter = new PayCompleteParameter();
        $payCompleteParameter
            ->set('ID', self::ID)
            ->set('AMOUNT', self::AMOUNT)
            ->set('ACCOUNTID', self::ACCOUNTID)
            ->set('ACTION', self::ACTION)
        ;

        $this->assertEquals(self::ID, $payCompleteParameter->get('ID'));
        $this->assertEquals(self::AMOUNT, $payCompleteParameter->get('AMOUNT'));
        $this->assertEquals(self::ACCOUNTID, $payCompleteParameter->get('ACCOUNTID'));
        $this->assertEquals(self::ACTION, $payCompleteParameter->get('ACTION'));

        $this->assertCount(0, $payCompleteParameter->getInvalidData());
    }

    public function testCollectionWithValidData()
    {
        $payCompleteParameter = new PayCompleteParameter;

        $payCompleteParameterCollection = new Collection('');
        $payCompleteParameterCollection->addCollectionItem($payCompleteParameter);

        $payCompleteParameterCollection
            ->set('ID', self::ID)
            ->set('AMOUNT', self::AMOUNT)
            ->set('ACCOUNTID', self::ACCOUNTID)
            ->set('ACTION', self::ACTION)
        ;

        $this->assertEquals(self::ID, $payCompleteParameterCollection->get('ID'));
        $this->assertEquals(self::AMOUNT, $payCompleteParameterCollection->get('AMOUNT'));
        $this->assertEquals(self::ACCOUNTID, $payCompleteParameterCollection->get('ACCOUNTID'));
        $this->assertEquals(self::ACTION, $payCompleteParameterCollection->get('ACTION'));

        $this->assertCount(0, $payCompleteParameterCollection->getInvalidData());
    }
}
