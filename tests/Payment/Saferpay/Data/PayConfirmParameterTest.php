<?php

namespace Payment\Saferpay\Data;

use Payment\Saferpay\Data\Collection\Collection;

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

    public function testSetGetWithValidData()
    {
        $payConfirmParameter = new PayConfirmParameter();
        $payConfirmParameter
            ->set('MSGTYPE', self::MSGTYPE)
            ->set('VTVERIFY', self::VTVERIFY)
            ->set('KEYID', self::KEYID)
            ->set('ID', self::ID)
            ->set('TOKEN', self::TOKEN)
            ->set('ACCOUNTID', self::ACCOUNTID)
            ->set('AMOUNT', self::AMOUNT)
            ->set('CURRENCY', self::CURRENCY)
            ->set('CARDREFID', self::CARDREFID)
            ->set('SCDRESULT', self::SCDRESULT)
            ->set('PROVIDERID', self::PROVIDERID)
            ->set('PROVIDERNAME', self::PROVIDERNAME)
            ->set('ORDERID', self::ORDERID)
            ->set('IP', self::IP)
            ->set('IPCOUNTRY', self::IPCOUNTRY)
            ->set('CCCOUNTRY', self::CCCOUNTRY)
            ->set('MPI_LIABILITYSHIFT', self::MPI_LIABILITYSHIFT)
            ->set('ECI', self::ECI)
            ->set('XID', self::XID)
            ->set('CAVV', self::CAVV)
        ;

        $this->assertEquals(self::MSGTYPE, $payConfirmParameter->get('MSGTYPE'));
        $this->assertEquals(self::VTVERIFY, $payConfirmParameter->get('VTVERIFY'));
        $this->assertEquals(self::KEYID, $payConfirmParameter->get('KEYID'));
        $this->assertEquals(self::ID, $payConfirmParameter->get('ID'));
        $this->assertEquals(self::TOKEN, $payConfirmParameter->get('TOKEN'));
        $this->assertEquals(self::ACCOUNTID, $payConfirmParameter->get('ACCOUNTID'));
        $this->assertEquals(self::AMOUNT, $payConfirmParameter->get('AMOUNT'));
        $this->assertEquals(self::CURRENCY, $payConfirmParameter->get('CURRENCY'));
        $this->assertEquals(self::CARDREFID, $payConfirmParameter->get('CARDREFID'));
        $this->assertEquals(self::SCDRESULT, $payConfirmParameter->get('SCDRESULT'));
        $this->assertEquals(self::PROVIDERID, $payConfirmParameter->get('PROVIDERID'));
        $this->assertEquals(self::PROVIDERNAME, $payConfirmParameter->get('PROVIDERNAME'));
        $this->assertEquals(self::ORDERID, $payConfirmParameter->get('ORDERID'));
        $this->assertEquals(self::IP, $payConfirmParameter->get('IP'));
        $this->assertEquals(self::IPCOUNTRY, $payConfirmParameter->get('IPCOUNTRY'));
        $this->assertEquals(self::CCCOUNTRY, $payConfirmParameter->get('CCCOUNTRY'));
        $this->assertEquals(self::MPI_LIABILITYSHIFT, $payConfirmParameter->get('MPI_LIABILITYSHIFT'));
        $this->assertEquals(self::ECI, $payConfirmParameter->get('ECI'));
        $this->assertEquals(self::XID, $payConfirmParameter->get('XID'));
        $this->assertEquals(self::CAVV, $payConfirmParameter->get('CAVV'));

        $this->assertCount(0, $payConfirmParameter->getInvalidData());
    }

    public function testCollectionWithValidData()
    {
        $payConfirmParameter = new PayConfirmParameter;

        $payConfirmParameterCollection = new Collection('');
        $payConfirmParameterCollection->addCollectionItem($payConfirmParameter);

        $payConfirmParameterCollection
            ->set('MSGTYPE', self::MSGTYPE)
            ->set('VTVERIFY', self::VTVERIFY)
            ->set('KEYID', self::KEYID)
            ->set('ID', self::ID)
            ->set('TOKEN', self::TOKEN)
            ->set('ACCOUNTID', self::ACCOUNTID)
            ->set('AMOUNT', self::AMOUNT)
            ->set('CURRENCY', self::CURRENCY)
            ->set('CARDREFID', self::CARDREFID)
            ->set('SCDRESULT', self::SCDRESULT)
            ->set('PROVIDERID', self::PROVIDERID)
            ->set('PROVIDERNAME', self::PROVIDERNAME)
            ->set('ORDERID', self::ORDERID)
            ->set('IP', self::IP)
            ->set('IPCOUNTRY', self::IPCOUNTRY)
            ->set('CCCOUNTRY', self::CCCOUNTRY)
            ->set('MPI_LIABILITYSHIFT', self::MPI_LIABILITYSHIFT)
            ->set('ECI', self::ECI)
            ->set('XID', self::XID)
            ->set('CAVV', self::CAVV)
        ;

        $this->assertEquals(self::MSGTYPE, $payConfirmParameterCollection->get('MSGTYPE'));
        $this->assertEquals(self::VTVERIFY, $payConfirmParameterCollection->get('VTVERIFY'));
        $this->assertEquals(self::KEYID, $payConfirmParameterCollection->get('KEYID'));
        $this->assertEquals(self::ID, $payConfirmParameterCollection->get('ID'));
        $this->assertEquals(self::TOKEN, $payConfirmParameterCollection->get('TOKEN'));
        $this->assertEquals(self::ACCOUNTID, $payConfirmParameterCollection->get('ACCOUNTID'));
        $this->assertEquals(self::AMOUNT, $payConfirmParameterCollection->get('AMOUNT'));
        $this->assertEquals(self::CURRENCY, $payConfirmParameterCollection->get('CURRENCY'));
        $this->assertEquals(self::CARDREFID, $payConfirmParameterCollection->get('CARDREFID'));
        $this->assertEquals(self::SCDRESULT, $payConfirmParameterCollection->get('SCDRESULT'));
        $this->assertEquals(self::PROVIDERID, $payConfirmParameterCollection->get('PROVIDERID'));
        $this->assertEquals(self::PROVIDERNAME, $payConfirmParameterCollection->get('PROVIDERNAME'));
        $this->assertEquals(self::ORDERID, $payConfirmParameterCollection->get('ORDERID'));
        $this->assertEquals(self::IP, $payConfirmParameterCollection->get('IP'));
        $this->assertEquals(self::IPCOUNTRY, $payConfirmParameterCollection->get('IPCOUNTRY'));
        $this->assertEquals(self::CCCOUNTRY, $payConfirmParameterCollection->get('CCCOUNTRY'));
        $this->assertEquals(self::MPI_LIABILITYSHIFT, $payConfirmParameterCollection->get('MPI_LIABILITYSHIFT'));
        $this->assertEquals(self::ECI, $payConfirmParameterCollection->get('ECI'));
        $this->assertEquals(self::XID, $payConfirmParameterCollection->get('XID'));
        $this->assertEquals(self::CAVV, $payConfirmParameterCollection->get('CAVV'));

        $this->assertCount(0, $payConfirmParameter->getInvalidData());
    }
}
