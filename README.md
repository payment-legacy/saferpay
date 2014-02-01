### Saferpay API, an unofficial implementation

[![Build Status](https://api.travis-ci.org/payment/saferpay.png?branch=master)](https://travis-ci.org/payment/saferpay)
[![Total Downloads](https://poser.pugx.org/payment/saferpay/downloads.png)](https://packagist.org/packages/payment/saferpay)
[![Latest Stable Version](https://poser.pugx.org/payment/saferpay/v/stable.png)](https://packagist.org/packages/payment/saferpay)

#### a simple implementation

##### uses default (with buzz client)

```{.php}
use Payment\HttpClient\BuzzClient;
use Payment\Saferpay\Data\PayInitParameter;
```

##### creating a saferpay instance

```{.php}
$saferpay = new Saferpay;
```

##### set httpclient (with buzz)

```{.php}
$saferpay->setHttpClient(new BuzzClient());
```

##### implementation

```{.php}
$amount = 1200;
$currency = 'CHF';

if (getParam('status') == 'success') {
    $payConfirmParameter = $saferpay->verifyPayConfirm(getParam('DATA'), getParam('SIGNATURE'));
    if ($payConfirmParameter->get('AMOUNT') == $amount && $payConfirmParameter->get('CURRENCY') == $currency) {
        $saferpay->payCompleteV2($payConfirmParameter, 'Settlement');
        echo 'payment success!';
    } else {
        $saferpay->payCompleteV2($payConfirmParameter, 'Cancel');
        echo 'payment failed!';
    }
} else {
    $payInitParameter = new PayInitParameter();
    $payInitParameter->setAccountid(PayInitParameter::SAFERPAYTESTACCOUNT_ACCOUNTID);
    $payInitParameter->setAmount($amount);
    $payInitParameter->setCurrency($currency);
    $payInitParameter->setDescription(sprintf('Ordernumber: %s', '000001'));
    $payInitParameter->setSuccesslink(requestUrl() . '?status=success');
    $payInitParameter->setFaillink(requestUrl() . '?status=fail');
    $payInitParameter->setBacklink(requestUrl() . '?status=back');
    $payInitParameter->setDelivery('no'); // hide address form
    header('Location: ' . $saferpay->createPayInit($payInitParameter) , 302);
}
```

#### a billpay implemention (works only with providerset, use it standalone)

##### uses billpay (with buzz client)

```{.php}
use Payment\HttpClient\BuzzClient;
use Payment\Saferpay\Data\PayInitParameter;
use Payment\Saferpay\Data\PayConfirmParameter;
use Payment\Saferpay\Data\PayCompleteParameter;
use Payment\Saferpay\Data\PayCompleteResponse;
use Payment\Saferpay\Data\Billpay\BillpayPayInitParameter;
use Payment\Saferpay\Data\Billpay\BillpayPayConfirmParameter;
use Payment\Saferpay\Data\Billpay\BillpayPayCompleteParameter;
use Payment\Saferpay\Data\Billpay\BillpayPayCompleteResponse;
use Payment\Saferpay\Data\Collection\Collection;
```

##### creating a saferpay instance

```{.php}
$saferpay = new Saferpay;
```

##### set httpclient (with buzz)

```{.php}
$saferpay->setHttpClient(new BuzzClient());
```

##### implementation

```{.php}
$amount = 1200;
$currency = 'CHF';

if (getParam('status') == 'success') {
    $payConfirmParameter = new PayConfirmParameter;
    $billpayPayConfirmParameter = new BillpayPayConfirmParameter;

    $payConfirmParameterCollection = new Collection($payConfirmParameter->getRequestUrl());
    $payConfirmParameterCollection->addCollectionItem($payConfirmParameter);
    $payConfirmParameterCollection->addCollectionItem($billpayPayConfirmParameter);

    $payConfirmParameterCollection = $this->getSaferpay()->verifyPayConfirm(
        getParam('DATA'),
        getParam('SIGNATURE'),
        $objPayConfirmParameterCollection
    );

    $payCompleteParameter = new PayCompleteParameter;
    $billpayPayCompleteParameter = new BillpayPayCompleteParameter;

    $payCompleteParameterCollection = new Collection($payCompleteParameter->getRequestUrl());
    $payCompleteParameterCollection->addCollectionItem($payCompleteParameter);
    $payCompleteParameterCollection->addCollectionItem($billpayPayCompleteParameter);

    $payCompleteResponse = new PayCompleteResponse;
    $billpayPayCompleteResponse = new BillpayPayCompleteResponse;

    $payCompleteResponseCollection = new Collection($payCompleteResponse->getRequestUrl());
    $payCompleteResponseCollection->addCollectionItem($payCompleteResponse);
    $payCompleteResponseCollection->addCollectionItem($billpayPayCompleteResponse);

    if ($payConfirmParameterCollection->get('AMOUNT') == $amount &&
        $payConfirmParameterCollection->get('CURRENCY') == $currency) {

        $this->getSaferpay()->payCompleteV2(
            $payConfirmParameterCollection,
            'Settlement',
            PayInitParameter::SAFERPAYTESTACCOUNT_SPPASSWORD,
            $payCompleteParameterCollection,
            $payCompleteResponseCollection
        );

        echo 'payment success!';
    } else {
        $this->getSaferpay()->payCompleteV2(
            $payConfirmParameterCollection,
            'Cancel',
            PayInitParameter::SAFERPAYTESTACCOUNT_SPPASSWORD,
            $payCompleteParameterCollection,
            $payCompleteResponseCollection
        );

        echo 'payment failed!';
    }
} else {
    $payInitParameter = new PayInitParameter();
    $payInitParameter->setAccountid(PayInitParameter::SAFERPAYTESTACCOUNT_ACCOUNTID);
    $payInitParameter->setAmount($amount);
    $payInitParameter->setCurrency($currency);
    $payInitParameter->setDescription(sprintf('Ordernumber: %s', '000001'));
    $payInitParameter->setSuccesslink(requestUrl() . '?status=success');
    $payInitParameter->setFaillink(requestUrl() . '?status=fail');
    $payInitParameter->setBacklink(requestUrl() . '?status=back');
    $payInitParameter->setProviderset(array(BillpayPayInitParameter::PROVIDERSET_BILLPAY_INVOICE));

    $billpayPayInitParameter = new BillpayPayInitParameter();
    $billpayPayInitParameter->setLegalform(BillpayPayInitParameter::LEGALFORM_MISC);
    $billpayPayInitParameter->setDeliveryGender(BillpayPayInitParameter::GENDER_COMPANY);
    $billpayPayInitParameter->setDeliveryFirstname('John');
    $billpayPayInitParameter->setDeliveryLastname('Doe');
    $billpayPayInitParameter->setDeliveryStreet('Samplestreet 0');
    $billpayPayInitParameter->setDeliveryZip('00000');
    $billpayPayInitParameter->setDeliveryCity('Samplecity');
    $billpayPayInitParameter->setDeliveryCountry('US');
    $billpayPayInitParameter->setDeliveryPhone('+10000000000');

    $payInitParameterCollection = new Collection($payInitParameter->getRequestUrl());
    $payInitParameterCollection->addCollectionItem($payInitParameter);
    $payInitParameterCollection->addCollectionItem($billpayPayInitParameter);

    header('Location: ' . $saferpay->createPayInit($payInitParameterCollection) , 302);
}
```

##### we define some helpers (plain php)

```{.php}
function requestUrl()
{
    $protocol = strtolower(substr($_SERVER['SERVER_PROTOCOL'], 0, strpos($_SERVER['SERVER_PROTOCOL'], '/')));
    return $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

function getParam($key, $default = null)
{
    return array_key_exists($key, $_REQUEST) ? $_REQUEST[$key] : $default;
}
```
