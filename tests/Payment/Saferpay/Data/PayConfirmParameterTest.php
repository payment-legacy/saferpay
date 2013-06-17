<?php

namespace Payment\Saferpay\Data;

class PayConfirmParameterTest extends \PHPUnit_Framework_TestCase
{
    public function testSetterGetterWithValidData()
    {
        $msgType = 'PayConfirm';
        $vtverify = '(obsolete)';
        $keyId = '1-0';
        $id = 'WxWrIlA48W06rAjKKOp5bzS80E5A';
        $token = '(unused)';
        $accountId = '99867-94913159';
        $amount = '1200';
        $currency = 'CHF';
        $cardrefid = 'new';
        $scdresult = '7006';
        $providerId = '90';
        $providerName = 'Saferpay Test Card';
        $orderId = 'Test with id 1';
        $ip = '83.77.94.198';
        $ipCountry = 'CH';
        $cccountry = 'US';
        $mpiliabilityshift = 'yes';
        $eci = '1';
        $xid = 'SUVZYQJeMxslBAYPGW4AUhcbHAs=';
        $cavv = 'AAABBIIFmAAAAAAAAAAAAAAAAAA=';

        $payConfirmParameter = new PayConfirmParameter();
        $payConfirmParameter
            ->setMsgtype($msgType)
            ->setVtverify($vtverify)
            ->setKeyid($keyId)
            ->setId($id)
            ->setToken($token)
            ->setAccountid($accountId)
            ->setAmount($amount)
            ->setCurrency($currency)
            ->setCardrefid($cardrefid)
            ->setScdresult($scdresult)
            ->setProviderid($providerId)
            ->setProvidername($providerName)
            ->setOrderid($orderId)
            ->setIp($ip)
            ->setIpcountry($ipCountry)
            ->setCccountry($cccountry)
            ->setMpiliabilityshift($mpiliabilityshift)
            ->setEci($eci)
            ->setXid($xid)
            ->setCavv($cavv)
        ;

        $this->assertEquals($msgType, $payConfirmParameter->getMsgtype());
        $this->assertEquals($vtverify, $payConfirmParameter->getVtverify());
        $this->assertEquals($keyId, $payConfirmParameter->getKeyid());
        $this->assertEquals($id, $payConfirmParameter->getId());
        $this->assertEquals($token, $payConfirmParameter->getToken());
        $this->assertEquals($accountId, $payConfirmParameter->getAccountid());
        $this->assertEquals($amount, $payConfirmParameter->getAmount());
        $this->assertEquals($currency, $payConfirmParameter->getCurrency());
        $this->assertEquals($cardrefid, $payConfirmParameter->getCardrefid());
        $this->assertEquals($scdresult, $payConfirmParameter->getScdresult());
        $this->assertEquals($providerId, $payConfirmParameter->getProviderid());
        $this->assertEquals($providerName, $payConfirmParameter->getProvidername());
        $this->assertEquals($orderId, $payConfirmParameter->getOrderid());
        $this->assertEquals($ip, $payConfirmParameter->getIp());
        $this->assertEquals($ipCountry, $payConfirmParameter->getIpcountry());
        $this->assertEquals($cccountry, $payConfirmParameter->getCccountry());
        $this->assertEquals($mpiliabilityshift, $payConfirmParameter->getMpiliabilityshift());
        $this->assertEquals($eci, $payConfirmParameter->getEci());
        $this->assertEquals($xid, $payConfirmParameter->getXid());
        $this->assertEquals($cavv, $payConfirmParameter->getCavv());

        $this->assertCount(0, $payConfirmParameter->getInvalidData());
    }
}
