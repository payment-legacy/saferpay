<?php

namespace Payment\Saferpay\Data\Billpay;

use Payment\Saferpay\Data\Collection\Collection;

class BillpayPayCompleteParameterTest extends \PHPUnit_Framework_TestCase
{
    const POB_DELAY = 30;

    public function testSetterGetterWithValidData()
    {
        $billpayPayCompleteParameter = new BillpayPayCompleteParameter;
        $billpayPayCompleteParameter
            ->setPobDelay(self::POB_DELAY)
        ;

        $this->assertEquals(self::POB_DELAY, $billpayPayCompleteParameter->getPobDelay());

        $this->assertCount(0, $billpayPayCompleteParameter->getInvalidData());
    }

    public function testSetGetWithValidData()
    {
        $billpayPayCompleteParameter = new BillpayPayCompleteParameter;
        $billpayPayCompleteParameter
            ->set('POB_DELAY', self::POB_DELAY)
        ;

        $this->assertEquals(self::POB_DELAY, $billpayPayCompleteParameter->get('POB_DELAY'));

        $this->assertCount(0, $billpayPayCompleteParameter->getInvalidData());
    }

    public function testCollectionWithValidData()
    {
        $billpayPayCompleteParameter = new BillpayPayCompleteParameter;

        $payCompleteParameterCollection = new Collection('');
        $payCompleteParameterCollection->addCollectionItem($billpayPayCompleteParameter);

        $payCompleteParameterCollection
            ->set('POB_DELAY', self::POB_DELAY)
        ;

        $this->assertEquals(self::POB_DELAY, $payCompleteParameterCollection->get('POB_DELAY'));

        $this->assertCount(0, $payCompleteParameterCollection->getInvalidData());
    }
}
