<?php

namespace Payment\Saferpay;

use Payment\HttpClient\BuzzClient;
use Payment\Saferpay\Data\PayCompleteResponse;
use Payment\Saferpay\Data\PayConfirmParameter;
use Payment\Saferpay\Data\PayInitParameter;

class SaferpayTest extends \PHPUnit_Framework_TestCase
{
    public function testCreatePayInit()
    {
        $saferpay = new Saferpay();
        $saferpay->setHttpClient(new BuzzClient());

        $payInitParameter = new PayInitParameter();
        $payInitParameter->setAccountid('99867-94913159');
        $payInitParameter->setAmount(1200);
        $payInitParameter->setCurrency('CHF');
        $payInitParameter->setDescription(sprintf('Ordernumber: %s', '000001'));
        $payInitParameter->setSuccesslink('http://test.lo?status=success');
        $payInitParameter->setFaillink('http://test.lo?status=fail');
        $payInitParameter->setBacklink('http://test.lo?status=back');
        $payInitParameter->setDelivery('no'); // hide address form

        $url = $saferpay->createPayInit($payInitParameter);

        $this->assertStringStartsWith('https://www.saferpay.com/vt2/Pay.aspx', $url);

    }

    public function testVerifyPayConfirm()
    {
        $saferpay = new Saferpay();
        $saferpay->setHttpClient(new BuzzClient());

        $data = urldecode('%3cIDP+MSGTYPE%3d%22PayConfirm%22+TOKEN%3d%22(unused)%22+VTVERIFY%3d%22(obsolete)%22+KEYID%3d%221-0%22+ID%3d%22Ojp5Ibbz769YtAC7S92IAtGx6GYA%22+ACCOUNTID%3d%2299867-94913159%22+PROVIDERID%3d%2290%22+PROVIDERNAME%3d%22Saferpay+Test+Card%22+PAYMENTMETHOD%3d%226%22+AMOUNT%3d%221200%22+CURRENCY%3d%22CHF%22+IP%3d%22178.195.0.209%22+IPCOUNTRY%3d%22CH%22+CCCOUNTRY%3d%22US%22+MPI_LIABILITYSHIFT%3d%22yes%22+MPI_TX_CAVV%3d%22AAABBIIFmAAAAAAAAAAAAAAAAAA%3d%22+MPI_XID%3d%22aloKGARzMjllBBtRQV4Fbw8XcQI%3d%22+ECI%3d%221%22+CAVV%3d%22AAABBIIFmAAAAAAAAAAAAAAAAAA%3d%22+XID%3d%22aloKGARzMjllBBtRQV4Fbw8XcQI%3d%22+%2f%3e');
        $signature = '59e6773b39d0d800a9a33348eee8ef7fed72384c0aecca8a9040ec2322e74f612dae45efc7cd3d6329d3551db3ab91abbee8cd517fd50fa52b5e69cd0d860478';

        $payConfirmParameter = $saferpay->verifyPayConfirm($data, $signature);
        /** @var PayConfirmParameter $payConfirmParameter */

        $this->assertEquals('PayConfirm', $payConfirmParameter->getMsgtype());
        $this->assertEquals('(unused)', $payConfirmParameter->getToken());
        $this->assertEquals('(obsolete)', $payConfirmParameter->getVtverify());
        $this->assertEquals('1-0', $payConfirmParameter->getKeyid());
        $this->assertEquals('Ojp5Ibbz769YtAC7S92IAtGx6GYA', $payConfirmParameter->getId());
        $this->assertEquals('99867-94913159', $payConfirmParameter->getAccountid());
        $this->assertEquals('90', $payConfirmParameter->getProviderid());
        $this->assertEquals('Saferpay Test Card', $payConfirmParameter->getProvidername());
        $this->assertEquals('1200', $payConfirmParameter->getAmount());
        $this->assertEquals('CHF', $payConfirmParameter->getCurrency());
        $this->assertEquals('178.195.0.209', $payConfirmParameter->getIp());
        $this->assertEquals('CH', $payConfirmParameter->getIpcountry());
        $this->assertEquals('US', $payConfirmParameter->getCccountry());
        $this->assertEquals('yes', $payConfirmParameter->getMpiliabilityshift());
        $this->assertEquals('1', $payConfirmParameter->getEci());
        $this->assertEquals('AAABBIIFmAAAAAAAAAAAAAAAAAA=', $payConfirmParameter->getCavv());
        $this->assertEquals('aloKGARzMjllBBtRQV4Fbw8XcQI=', $payConfirmParameter->getXid());

        $this->arrayHasKey('MPI_TX_CAVV', $payConfirmParameter->getInvalidData());
        $this->arrayHasKey('MPI_XID', $payConfirmParameter->getInvalidData());
    }

    public function testPayCompleteV2()
    {
        $saferpay = new Saferpay();
        $saferpay->setHttpClient(new BuzzClient());

        $payConfirmParameter = new PayConfirmParameter();
        $payConfirmParameter->setId('Ojp5Ibbz769YtAC7S92IAtGx6GYA');
        $payConfirmParameter->setAmount('1200');
        $payConfirmParameter->setAccountid('99867-94913159');

        $payCompleteResponse  = $saferpay->payCompleteV2($payConfirmParameter, 'Settlement');
        /** @var PayCompleteResponse $payCompleteResponse */

        $this->assertEquals(0, $payCompleteResponse->getResult());
    }
}
