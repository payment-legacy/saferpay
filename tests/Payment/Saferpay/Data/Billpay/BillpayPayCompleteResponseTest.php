<?php

namespace Payment\Saferpay\Data\Billpay;

use Payment\Saferpay\Data\Collection\Collection;

class BillpayPayCompleteResponseTest extends \PHPUnit_Framework_TestCase
{
    const POB_DUEDATE = '20131220';
    const POB_ACCOUNTHOLDER = 'Accountholder';
    const POB_ACCOUNTNUMBER = 'CH0000000000000000000';
    const POB_BANKCODE = '0000';
    const POB_BANKNAME = 'Bankname';
    const POB_PAYERNOTE = 'ÂA00/0000';

    public function testSetterGetterWithValidData()
    {
        $billpayPayCompleteResponse = new BillpayPayCompleteResponse;
        $billpayPayCompleteResponse
            ->setPobDuedate(self::POB_DUEDATE)
            ->setPobAccountholder(self::POB_ACCOUNTHOLDER)
            ->setPobAccountnumber(self::POB_ACCOUNTNUMBER)
            ->setPobBankcode(self::POB_BANKCODE)
            ->setPobBankname(self::POB_BANKNAME)
            ->setPobPayernote(self::POB_PAYERNOTE)
        ;

        $this->assertEquals(self::POB_DUEDATE, $billpayPayCompleteResponse->getPobDuedate());
        $this->assertEquals(self::POB_ACCOUNTHOLDER, $billpayPayCompleteResponse->getPobAccountholder());
        $this->assertEquals(self::POB_ACCOUNTNUMBER, $billpayPayCompleteResponse->getPobAccountnumber());
        $this->assertEquals(self::POB_BANKCODE, $billpayPayCompleteResponse->getPobBankcode());
        $this->assertEquals(self::POB_BANKNAME, $billpayPayCompleteResponse->getPobBankname());
        $this->assertEquals(self::POB_PAYERNOTE, $billpayPayCompleteResponse->getPobPayernote());

        $this->assertCount(0, $billpayPayCompleteResponse->getInvalidData());
    }

    public function testSetGetWithValidData()
    {
        $billpayPayCompleteResponse = new BillpayPayCompleteResponse;
        $billpayPayCompleteResponse
            ->set('POB_DUEDATE', self:: POB_DUEDATE)
            ->set('POB_ACCOUNTHOLDER', self:: POB_ACCOUNTHOLDER)
            ->set('POB_ACCOUNTNUMBER', self:: POB_ACCOUNTNUMBER)
            ->set('POB_BANKCODE', self:: POB_BANKCODE)
            ->set('POB_BANKNAME', self:: POB_BANKNAME)
            ->set('POB_PAYERNOTE', self:: POB_PAYERNOTE)
        ;

        $this->assertEquals(self::POB_DUEDATE, $billpayPayCompleteResponse->get('POB_DUEDATE'));
        $this->assertEquals(self::POB_ACCOUNTHOLDER, $billpayPayCompleteResponse->get('POB_ACCOUNTHOLDER'));
        $this->assertEquals(self::POB_ACCOUNTNUMBER, $billpayPayCompleteResponse->get('POB_ACCOUNTNUMBER'));
        $this->assertEquals(self::POB_BANKCODE, $billpayPayCompleteResponse->get('POB_BANKCODE'));
        $this->assertEquals(self::POB_BANKNAME, $billpayPayCompleteResponse->get('POB_BANKNAME'));
        $this->assertEquals(self::POB_PAYERNOTE, $billpayPayCompleteResponse->get('POB_PAYERNOTE'));

        $this->assertCount(0, $billpayPayCompleteResponse->getInvalidData());
    }

    public function testCollectionWithValidData()
    {
        $billpayPayCompleteResponse = new BillpayPayCompleteResponse;

        $payCompleteResponseCollection = new Collection('');
        $payCompleteResponseCollection->addCollectionItem($billpayPayCompleteResponse);

        $payCompleteResponseCollection
            ->set('POB_DUEDATE', self:: POB_DUEDATE)
            ->set('POB_ACCOUNTHOLDER', self:: POB_ACCOUNTHOLDER)
            ->set('POB_ACCOUNTNUMBER', self:: POB_ACCOUNTNUMBER)
            ->set('POB_BANKCODE', self:: POB_BANKCODE)
            ->set('POB_BANKNAME', self:: POB_BANKNAME)
            ->set('POB_PAYERNOTE', self:: POB_PAYERNOTE)
        ;

        $this->assertEquals(self::POB_DUEDATE, $payCompleteResponseCollection->get('POB_DUEDATE'));
        $this->assertEquals(self::POB_ACCOUNTHOLDER, $payCompleteResponseCollection->get('POB_ACCOUNTHOLDER'));
        $this->assertEquals(self::POB_ACCOUNTNUMBER, $payCompleteResponseCollection->get('POB_ACCOUNTNUMBER'));
        $this->assertEquals(self::POB_BANKCODE, $payCompleteResponseCollection->get('POB_BANKCODE'));
        $this->assertEquals(self::POB_BANKNAME, $payCompleteResponseCollection->get('POB_BANKNAME'));
        $this->assertEquals(self::POB_PAYERNOTE, $payCompleteResponseCollection->get('POB_PAYERNOTE'));

        $this->assertCount(0, $payCompleteResponseCollection->getInvalidData());
    }
}
