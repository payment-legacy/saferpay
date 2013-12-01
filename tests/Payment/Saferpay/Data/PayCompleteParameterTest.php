<?php

namespace Payment\Saferpay\Data;

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
}
