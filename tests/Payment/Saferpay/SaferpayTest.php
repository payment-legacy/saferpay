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

        $data = urldecode('%3CIDP+MSGTYPE%3d%22PayConfirm%22+TOKEN%3d%22%28unused%29%22+VTVERIFY%3d%22%28obsolete%29%22+KEYID%3d%221-0%22+ID%3d%22v9OUt6A2S667tAzGzIMbAhGtbptA%22+ACCOUNTID%3d%2299867-94913159%22+PROVIDERID%3d%2290%22+PROVIDERNAME%3d%22Saferpay+Test+Card%22+PAYMENTMETHOD%3d%226%22+AMOUNT%3d%221200%22+CURRENCY%3d%22CHF%22+IP%3d%22178.196.110.121%22+IPCOUNTRY%3d%22CH%22+CCCOUNTRY%3d%22US%22+MPI_LIABILITYSHIFT%3d%22yes%22+MPI_TX_CAVV%3d%22AAABBIIFmAAAAAAAAAAAAAAAAAA%3d%22+MPI_XID%3d%22NX5DQQhzLy02BAV1DHQIEzlOMAE%3d%22+ECI%3d%221%22+CAVV%3d%22AAABBIIFmAAAAAAAAAAAAAAAAAA%3d%22+XID%3d%22NX5DQQhzLy02BAV1DHQIEzlOMAE%3d%22+%2f%3E');
        $signature = '7398b7c859d0d78180eaeca5ddd80ed8eff32c6d11a5def0e1fd3cc4c881ea83094fcbfd179c93eda412fda998cf96a32c037b36b548165449cb980ed16b079a';

        $payConfirmParameter = $saferpay->verifyPayConfirm($data, $signature);
        /** @var PayConfirmParameter $payConfirmParameter */

        $this->assertEquals('PayConfirm', $payConfirmParameter->getMsgtype());
        $this->assertEquals('(unused)', $payConfirmParameter->getToken());
        $this->assertEquals('(obsolete)', $payConfirmParameter->getVtverify());
        $this->assertEquals('1-0', $payConfirmParameter->getKeyid());
        $this->assertEquals('v9OUt6A2S667tAzGzIMbAhGtbptA', $payConfirmParameter->getId());
        $this->assertEquals('99867-94913159', $payConfirmParameter->getAccountid());
        $this->assertEquals('90', $payConfirmParameter->getProviderid());
        $this->assertEquals('Saferpay Test Card', $payConfirmParameter->getProvidername());
        $this->assertEquals('1200', $payConfirmParameter->getAmount());
        $this->assertEquals('CHF', $payConfirmParameter->getCurrency());
        $this->assertEquals('178.196.110.121', $payConfirmParameter->getIp());
        $this->assertEquals('CH', $payConfirmParameter->getIpcountry());
        $this->assertEquals('US', $payConfirmParameter->getCccountry());
        $this->assertEquals('yes', $payConfirmParameter->getMpiliabilityshift());
        $this->assertEquals('1', $payConfirmParameter->getEci());
        $this->assertEquals('AAABBIIFmAAAAAAAAAAAAAAAAAA=', $payConfirmParameter->getCavv());
        $this->assertEquals('NX5DQQhzLy02BAV1DHQIEzlOMAE=', $payConfirmParameter->getXid());

        $this->arrayHasKey('MPI_TX_CAVV', $payConfirmParameter->getInvalidData());
        $this->arrayHasKey('MPI_XID', $payConfirmParameter->getInvalidData());
    }

    public function testPayCompleteV2()
    {
        $saferpay = new Saferpay();
        $saferpay->setHttpClient(new BuzzClient());

        $payConfirmParameter = new PayConfirmParameter();
        $payConfirmParameter->setId('v9OUt6A2S667tAzGzIMbAhGtbptA');
        $payConfirmParameter->setAmount('1200');
        $payConfirmParameter->setAccountid('99867-94913159');

        $payCompleteResponse  = $saferpay->payCompleteV2($payConfirmParameter, 'Settlement');
        /** @var PayCompleteResponse $payCompleteResponse */

        $this->assertEquals(0, $payCompleteResponse->getResult());
    }
}
