<?php

namespace Payment\Saferpay\Data;

class PayInitParameter extends AbstractData implements PayInitParameterWithDataInterface
{
    /**
     * @param string $accountid
     * @return $this
     */
    public function setAccountid($accountid)
    {
        $this->set('ACCOUNTID', $accountid);

        return $this;
    }

    /**
     * @return string
     */
    public function getAccountid()
    {
        return $this->get('ACCOUNTID');
    }

    /**
     * @param int $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->set('AMOUNT', $amount);

        return $this;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->get('AMOUNT');
    }

    /**
     * @param string $currency
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->set('CURRENCY', $currency);

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->get('CURRENCY');
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->set('DESCRIPTION', $description);

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->get('DESCRIPTION');
    }

    /**
     * @param string $orderid
     * @return $this
     */
    public function setOrderid($orderid)
    {
        $this->set('ORDERID', $orderid);

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderid()
    {
        return $this->get('ORDERID');
    }

    /**
     * @param string $vtconfig
     * @return $this
     */
    public function setVtconfig($vtconfig)
    {
        $this->set('VTCONFIG', $vtconfig);

        return $this;
    }

    /**
     * @return string
     */
    public function getVtconfig()
    {
        return $this->get('VTCONFIG');
    }

    /**
     * @param string $successlink
     * @return $this
     */
    public function setSuccesslink($successlink)
    {
        $this->set('SUCCESSLINK', $successlink);

        return $this;
    }

    /**
     * @return string
     */
    public function getSuccesslink()
    {
        return $this->get('SUCCESSLINK');
    }

    /**
     * @param string $faillink
     * @return $this
     */
    public function setFaillink($faillink)
    {
        $this->set('FAILLINK', $faillink);

        return $this;
    }

    /**
     * @return string
     */
    public function getFaillink()
    {
        return $this->get('FAILLINK');
    }

    /**
     * @param string $backlink
     * @return $this
     */
    public function setBacklink($backlink)
    {
        $this->set('BACKLINK', $backlink);

        return $this;
    }

    /**
     * @return string
     */
    public function getBacklink()
    {
        return $this->get('BACKLINK');
    }

    /**
     * @param string $notifyurl
     * @return $this
     */
    public function setNotifyurl($notifyurl)
    {
        $this->set('NOTIFYURL', $notifyurl);

        return $this;
    }

    /**
     * @return string
     */
    public function getNotifyurl()
    {
        return $this->get('NOTIFYURL');
    }

    /**
     * @param int $autoclose
     * @return $this
     */
    public function setAutoclose($autoclose)
    {
        $this->set('AUTOCLOSE', $autoclose);

        return $this;
    }

    /**
     * @return int
     */
    public function getAutoclose()
    {
        return $this->get('AUTOCLOSE');
    }

    /**
     * @param string $ccname
     * @return $this
     */
    public function setCcname($ccname)
    {
        $this->set('CCNAME', $ccname);

        return $this;
    }

    /**
     * @return string
     */
    public function getCcname()
    {
        return $this->get('CCNAME');
    }

    /**
     * @param string $notifyaddress
     * @return $this
     */
    public function setNotifyaddress($notifyaddress)
    {
        $this->set('NOTIFYADDRESS', $notifyaddress);

        return $this;
    }

    /**
     * @return string
     */
    public function getNotifyaddress()
    {
        return $this->get('NOTIFYADDRESS');
    }

    /**
     * @param string $usernotify
     * @return $this
     */
    public function setUsernotify($usernotify)
    {
        $this->set('USERNOTIFY', $usernotify);

        return $this;
    }

    /**
     * @return string
     */
    public function getUsernotify()
    {
        return $this->get('USERNOTIFY');
    }

    /**
     * @param string $langid
     * @return $this
     */
    public function setLangid($langid)
    {
        $this->set('LANGID', $langid);

        return $this;
    }

    /**
     * @return string
     */
    public function getLangid()
    {
        return $this->get('LANGID');
    }

    /**
     * @param string $showlanguages
     * @return $this
     */
    public function setShowlanguages($showlanguages)
    {
        $this->set('SHOWLANGUAGES', $showlanguages);

        return $this;
    }

    /**
     * @return string
     */
    public function getShowlanguages()
    {
        return $this->get('SHOWLANGUAGES');
    }

    /**
     * @param array $paymentmethods
     * @return $this
     */
    public function setPaymentmethods(array $paymentmethods)
    {
        $this->set('PAYMENTMETHODS', implode(',', $paymentmethods));

        return $this;
    }

    /**
     * @return array
     */
    public function getPaymentmethods()
    {
        return explode(',', (string) $this->get('PAYMENTMETHODS'));
    }

    /**
     * @param int $duration
     * @return $this
     */
    public function setDuration($duration)
    {
        $this->set('DURATION', $duration);

        return $this;
    }

    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->get('DURATION');
    }

    /**
     * @param string $cardrefid
     * @return $this
     */
    public function setCardrefid($cardrefid)
    {
        $this->set('CARDREFID', $cardrefid);

        return $this;
    }

    /**
     * @return string
     */
    public function getCardrefid()
    {
        return $this->get('CARDREFID');
    }

    /**
     * @param string $delivery
     * @return $this
     */
    public function setDelivery($delivery)
    {
        $this->set('DELIVERY', $delivery);

        return $this;
    }

    /**
     * @return string
     */
    public function getDelivery()
    {
        return $this->get('DELIVERY');
    }

    /**
     * @param string $appearance
     * @return $this
     */
    public function setAppearance($appearance)
    {
        $this->set('APPEARANCE', $appearance);

        return $this;
    }

    /**
     * @return string
     */
    public function getAppearance()
    {
        return $this->get('APPEARANCE');
    }

    /**
     * @param string $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->set('ADDRESS', $address);

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->get('ADDRESS');
    }

    /**
     * @param string $company
     * @return $this
     */
    public function setCompany($company)
    {
        $this->set('COMPANY', $company);

        return $this;
    }

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->get('COMPANY');
    }

    /**
     * @param string $gender
     * @return $this
     */
    public function setGender($gender)
    {
        $this->set('GENDER', $gender);

        return $this;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->get('GENDER');
    }

    /**
     * @param string $firstname
     * @return $this
     */
    public function setFirstname($firstname)
    {
        $this->set('FIRSTNAME', $firstname);

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->get('FIRSTNAME');
    }

    /**
     * @param string $lastname
     * @return $this
     */
    public function setLastname($lastname)
    {
        $this->set('LASTNAME', $lastname);

        return $this;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->get('LASTNAME');
    }

    /**
     * @param string $street
     * @return $this
     */
    public function setStreet($street)
    {
        $this->set('STREET', $street);

        return $this;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->get('STREET');
    }

    /**
     * @param string $zip
     * @return $this
     */
    public function setZip($zip)
    {
        $this->set('ZIP', $zip);

        return $this;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->get('ZIP');
    }

    /**
     * @param string $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->set('CITY', $city);

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->get('CITY');
    }

    /**
     * @param string $country
     * @return $this
     */
    public function setCountry($country)
    {
        $this->set('COUNTRY', $country);

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->get('COUNTRY');
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->set('EMAIL', $email);

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->get('EMAIL');
    }

    /**
     * @param string $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->set('PHONE', $phone);

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->get('PHONE');
    }
}
