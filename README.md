### an unofficial saferpay payment implementation

#### a simple implementation

##### uses (with buzz client)

```php
use Payment\HttpClient\BuzzClient;
use Payment\Saferpay\Data\PayCompleteParameter;
use Payment\Saferpay\Data\PayCompleteResponse;
use Payment\Saferpay\Data\PayConfirmParameter;
use Payment\Saferpay\Data\PayInitParameter;
```

##### creating a saferpay instance

```php
$saferpay = new Saferpay;
```

##### set httpclient (with buzz)

```php
$saferpay->setHttpClient(new BuzzClient());
```

##### the logic

```php
$amount = 1200;
$currency = 'CHF';

if(getParam('status') == 'success') {
    $payConfirmParameter = new PayConfirmParameter();
    $payCompleteParameter = new PayCompleteParameter();
    $payCompleteResponse = new PayCompleteResponse();
    $saferpay->verifyPayConfirm($payConfirmParameter, getParam('DATA'), getParam('SIGNATURE'));
    if($payConfirmParameter->getAMOUNT() == $amount && $payConfirmParameter->getCURRENCY() == $currency) {
        $saferpay->payCompleteV2($payConfirmParameter, $payCompleteParameter, $payCompleteResponse);
        echo 'payed!';
    } else {
        $saferpay->payCompleteV2($payConfirmParameter, $payCompleteParameter, $payCompleteResponse, 'CANCEL');
    }
} else {
    $payInitParameter = new PayInitParameter();
    $payInitParameter->setAccountid('99867-94913159');
    $payInitParameter->setAmount($amount);
    $payInitParameter->setCurrency($currency);
    $payInitParameter->setDescription(sprintf('Bestellnummer: %s', '000001'));
    $payInitParameter->setSuccesslink(requestUrl() . '?status=success');
    $payInitParameter->setFaillink(requestUrl() . '?status=fail');
    $payInitParameter->setBacklink(requestUrl() . '?status=back');
    $payInitParameter->setDelivery('no'); // hide address form
    header('Location: ' . $saferpay->createPayInit($payInitParameter) , 302);
}
```

##### we define some helpers (plain php)

```php
function requestUrl()
{
    $protocol = strtolower(substr($_SERVER['SERVER_PROTOCOL'], 0, strpos($_SERVER['SERVER_PROTOCOL'], '/')));
    return $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

function getParam($key, $default = null)
{
    return array_key_exists($key, $_GET) ? $_GET[$key] : $default;
}
```
