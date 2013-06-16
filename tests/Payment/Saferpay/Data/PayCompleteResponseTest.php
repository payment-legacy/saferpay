<?php

namespace Payment\Saferpay\Data;

class PayCompleteResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testSetterGetterWithValidData()
    {
        $msgType = 'PayConfirm';
        $id = 'WxWrIlA48W06rAjKKOp5bzS80E5A';
        $result = 0;
        $message = 'Test message';
        $authmessage = 'Auth message';

        $payCompleteResponse = new PayCompleteResponse();
        $payCompleteResponse
            ->setMsgtype($msgType)
            ->setId($id)
            ->setResult($result)
            ->setMessage($message)
            ->setAuthmessage($authmessage)
        ;

        $this->assertEquals($msgType, $payCompleteResponse->getMsgtype());
        $this->assertEquals($id, $payCompleteResponse->getId());
        $this->assertEquals($result, $payCompleteResponse->getResult());
        $this->assertEquals($message, $payCompleteResponse->getMessage());
        $this->assertEquals($authmessage, $payCompleteResponse->getAuthmessage());

        $this->assertCount(0, $payCompleteResponse->getInvalidData());
    }
}
