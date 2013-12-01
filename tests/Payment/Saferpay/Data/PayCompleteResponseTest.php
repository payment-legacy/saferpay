<?php

namespace Payment\Saferpay\Data;

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
}
