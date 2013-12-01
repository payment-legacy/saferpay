<?php

namespace Payment\Saferpay\Data;

use Payment\Saferpay\Data\Collection\Collection;

class PayCompleteResponseTest extends \PHPUnit_Framework_TestCase
{
    const MSGTYPE = 'PayConfirm';
    const ID = 'WxWrIlA48W06rAjKKOp5bzS80E5A';
    const RESULT = 0;
    const MESSAGE = 'Test message';
    const AUTHMESSAGE = 'Auth message';

    public function testSetterGetterWithValidData()
    {
        $payCompleteResponse = new PayCompleteResponse();
        $payCompleteResponse
            ->setMsgtype(self::MSGTYPE)
            ->setId(self::ID)
            ->setResult(self::RESULT)
            ->setMessage(self::MESSAGE)
            ->setAuthmessage(self::AUTHMESSAGE)
        ;

        $this->assertEquals(self::MSGTYPE, $payCompleteResponse->getMsgtype());
        $this->assertEquals(self::ID, $payCompleteResponse->getId());
        $this->assertEquals(self::RESULT, $payCompleteResponse->getResult());
        $this->assertEquals(self::MESSAGE, $payCompleteResponse->getMessage());
        $this->assertEquals(self::AUTHMESSAGE, $payCompleteResponse->getAuthmessage());

        $this->assertCount(0, $payCompleteResponse->getInvalidData());
    }

    public function testSetGetWithValidData()
    {
        $payCompleteResponse = new PayCompleteResponse();
        $payCompleteResponse
            ->set('MSGTYPE', self::MSGTYPE)
            ->set('ID', self::ID)
            ->set('RESULT', self::RESULT)
            ->set('MESSAGE', self::MESSAGE)
            ->set('AUTHMESSAGE', self::AUTHMESSAGE)
        ;

        $this->assertEquals(self::MSGTYPE, $payCompleteResponse->get('MSGTYPE'));
        $this->assertEquals(self::ID, $payCompleteResponse->get('ID'));
        $this->assertEquals(self::RESULT, $payCompleteResponse->get('RESULT'));
        $this->assertEquals(self::MESSAGE, $payCompleteResponse->get('MESSAGE'));
        $this->assertEquals(self::AUTHMESSAGE, $payCompleteResponse->get('AUTHMESSAGE'));

        $this->assertCount(0, $payCompleteResponse->getInvalidData());
    }

    public function testCollectionWithValidData()
    {
        $payCompleteResponse = new PayCompleteResponse;

        $payCompleteResponseCollection = new Collection('');
        $payCompleteResponseCollection->addCollectionItem($payCompleteResponse);

        $payCompleteResponseCollection
            ->set('MSGTYPE', self::MSGTYPE)
            ->set('ID', self::ID)
            ->set('RESULT', self::RESULT)
            ->set('MESSAGE', self::MESSAGE)
            ->set('AUTHMESSAGE', self::AUTHMESSAGE)
        ;

        $this->assertEquals(self::MSGTYPE, $payCompleteResponseCollection->get('MSGTYPE'));
        $this->assertEquals(self::ID, $payCompleteResponseCollection->get('ID'));
        $this->assertEquals(self::RESULT, $payCompleteResponseCollection->get('RESULT'));
        $this->assertEquals(self::MESSAGE, $payCompleteResponseCollection->get('MESSAGE'));
        $this->assertEquals(self::AUTHMESSAGE, $payCompleteResponseCollection->get('AUTHMESSAGE'));

        $this->assertCount(0, $payCompleteResponseCollection->getInvalidData());
    }
}
