<?php

namespace Payment\Saferpay\Data;

class PayCompleteParameterTest extends \PHPUnit_Framework_TestCase
{
    public function testSetterGetterWithValidData()
    {
        $id = 'WxWrIlA48W06rAjKKOp5bzS80E5A';
        $amount = '1200';
        $accountId = '99867-94913159';
        $action = 'Settlement';

        $payCompleteParameter = new PayCompleteParameter();
        $payCompleteParameter
            ->setId($id)
            ->setAmount($amount)
            ->setAccountid($accountId)
            ->setAction($action)
        ;

        $this->assertEquals($id, $payCompleteParameter->getId());
        $this->assertEquals($amount, $payCompleteParameter->getAmount());
        $this->assertEquals($accountId, $payCompleteParameter->getAccountid());
        $this->assertEquals($action, $payCompleteParameter->getAction());

        $this->assertCount(0, $payCompleteParameter->getInvalidData());
    }
}
