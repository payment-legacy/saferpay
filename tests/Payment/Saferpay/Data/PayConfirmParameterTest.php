<?php

namespace Payment\Saferpay\Data;

class PayConfirmParameterTest extends \PHPUnit_Framework_TestCase
{
    const MSGTYPE = 'PayConfirm';
    const VTVERIFY = '(obsolete)';
    const KEYID = '1-0';
    const ID = 'WxWrIlA48W06rAjKKOp5bzS80E5A';
    const TOKEN = '(unused)';
    const ACCOUNTID = '99867-94913159';
    const AMOUNT = '1200';
    const CURRENCY = 'CHF';
    const CARDREFID = 'new';
    const SCDRESULT = PayConfirmParameterInterface::SCDRESULT_OK;
    const PROVIDERID = '90';
    const PROVIDERNAME = 'Saferpay Test Card';
    const ORDERID = 'Test with id 1';
    const IP = '83.77.94.198';
    const IPCOUNTRY = 'CH';
    const CCCOUNTRY = 'US';
    const MPI_LIABILITYSHIFT = 'yes';
    const ECI = PayConfirmParameterInterface::ECI_NO_LIABILITY_SHIFT;
    const XID = 'SUVZYQJeMxslBAYPGW4AUhcbHAs=';
    const CAVV = 'AAABBIIFmAAAAAAAAAAAAAAAAAA=';

    public function testSetterGetterWithValidData()
    {
        $payConfirmParameter = new PayConfirmParameter();
        $payConfirmParameter
            ->setMsgtype(self::MSGTYPE)
            ->setVtverify(self::VTVERIFY)
            ->setKeyid(self::KEYID)
            ->setId(self::ID)
            ->setToken(self::TOKEN)
            ->setAccountid(self::ACCOUNTID)
            ->setAmount(self::AMOUNT)
            ->setCurrency(self::CURRENCY)
            ->setCardrefid(self::CARDREFID)
            ->setScdresult(self::SCDRESULT)
            ->setProviderid(self::PROVIDERID)
            ->setProvidername(self::PROVIDERNAME)
            ->setOrderid(self::ORDERID)
            ->setIp(self::IP)
            ->setIpcountry(self::IPCOUNTRY)
            ->setCccountry(self::CCCOUNTRY)
            ->setMpiliabilityshift(self::MPI_LIABILITYSHIFT)
            ->setEci(self::ECI)
            ->setXid(self::XID)
            ->setCavv(self::CAVV)
        ;

        $this->assertEquals(self::MSGTYPE, $payConfirmParameter->getMsgtype());
        $this->assertEquals(self::VTVERIFY, $payConfirmParameter->getVtverify());
        $this->assertEquals(self::KEYID, $payConfirmParameter->getKeyid());
        $this->assertEquals(self::ID, $payConfirmParameter->getId());
        $this->assertEquals(self::TOKEN, $payConfirmParameter->getToken());
        $this->assertEquals(self::ACCOUNTID, $payConfirmParameter->getAccountid());
        $this->assertEquals(self::AMOUNT, $payConfirmParameter->getAmount());
        $this->assertEquals(self::CURRENCY, $payConfirmParameter->getCurrency());
        $this->assertEquals(self::CARDREFID, $payConfirmParameter->getCardrefid());
        $this->assertEquals(self::SCDRESULT, $payConfirmParameter->getScdresult());
        $this->assertEquals(self::PROVIDERID, $payConfirmParameter->getProviderid());
        $this->assertEquals(self::PROVIDERNAME, $payConfirmParameter->getProvidername());
        $this->assertEquals(self::ORDERID, $payConfirmParameter->getOrderid());
        $this->assertEquals(self::IP, $payConfirmParameter->getIp());
        $this->assertEquals(self::IPCOUNTRY, $payConfirmParameter->getIpcountry());
        $this->assertEquals(self::CCCOUNTRY, $payConfirmParameter->getCccountry());
        $this->assertEquals(self::MPI_LIABILITYSHIFT, $payConfirmParameter->getMpiliabilityshift());
        $this->assertEquals(self::ECI, $payConfirmParameter->getEci());
        $this->assertEquals(self::XID, $payConfirmParameter->getXid());
        $this->assertEquals(self::CAVV, $payConfirmParameter->getCavv());

        $this->assertCount(0, $payConfirmParameter->getInvalidData());
    }
}
