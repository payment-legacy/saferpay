<?php

namespace Payment\Saferpay\Data\Billpay;

use Payment\Saferpay\Data\AbstractGetSet;
use Payment\Saferpay\Data\SubBaseInterface;

class BillpayPayInitParameter extends AbstractGetSet implements BillpayPayInitParameterInterface, SubBaseInterface
{
    /**
     * @param string $legalform
     * @return $this
     */
    public function setLegalform($legalform)
    {
        $this->set('LEGALFORM', $legalform);

        return $this;
    }

    /**
     * @return string
     */
    public function getLegalform()
    {
        return $this->get('LEGALFORM');
    }

    /**
     * @param string $addressAddition
     * @return $this
     */
    public function setAddressAddition($addressAddition)
    {
        $this->set('ADDRESSADDITION', $addressAddition);

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressAddition()
    {
        return $this->get('ADDRESSADDITION');
    }

    /**
     * @param int $dateofBirth
     * @return $this
     */
    public function setDateofBirth($dateofBirth)
    {
        $this->set('DATEOFBIRTH', $dateofBirth);

        return $this;
    }

    /**
     * @return int
     */
    public function getDateofBirth()
    {
        return $this->get('DATEOFBIRTH');
    }

    /**
     * @param string $deliveryGender
     * @return $this
     */
    public function setDeliveryGender($deliveryGender)
    {
        $this->set('DELIVERY_GENDER', $deliveryGender);

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryGender()
    {
        return $this->get('DELIVERY_GENDER');
    }

    /**
     * @param string $deliveryFirstname
     * @return $this
     */
    public function setDeliveryFirstname($deliveryFirstname)
    {
        $this->set('DELIVERY_FIRSTNAME', $deliveryFirstname);

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryFirstname()
    {
        return $this->get('DELIVERY_FIRSTNAME');
    }

    /**
     * @param string $deliveryLastname
     * @return $this
     */
    public function setDeliveryLastname($deliveryLastname)
    {
        $this->set('DELIVERY_LASTNAME', $deliveryLastname);

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryLastname()
    {
        return $this->get('DELIVERY_LASTNAME');
    }

    /**
     * @param string $deliveryStreet
     * @return $this
     */
    public function setDeliveryStreet($deliveryStreet)
    {
        $this->set('DELIVERY_STREET', $deliveryStreet);

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryStreet()
    {
        return $this->get('DELIVERY_STREET');
    }

    /**
     * @param string $deliveryAddressAddition
     * @return $this
     */
    public function setDeliveryAddressAddition($deliveryAddressAddition)
    {
        $this->set('DELIVERY_ADDRESSADDITION', $deliveryAddressAddition);

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryAddressAddition()
    {
        return $this->get('DELIVERY_ADDRESSADDITION');
    }

    /**
     * @param string $deliveryZip
     * @return $this
     */
    public function setDeliveryZip($deliveryZip)
    {
        $this->set('DELIVERY_ZIP', $deliveryZip);

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryZip()
    {
        return $this->get('DELIVERY_ZIP');
    }

    /**
     * @param string $deliveryCity
     * @return $this
     */
    public function setDeliveryCity($deliveryCity)
    {
        $this->set('DELIVERY_CITY', $deliveryCity);

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryCity()
    {
        return $this->get('DELIVERY_CITY');
    }

    /**
     * @param string $deliveryCountry
     * @return $this
     */
    public function setDeliveryCountry($deliveryCountry)
    {
        $this->set('DELIVERY_COUNTRY', $deliveryCountry);

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryCountry()
    {
        return $this->get('DELIVERY_COUNTRY');
    }

    /**
     * @param string $deliveryPhone
     * @return $this
     */
    public function setDeliveryPhone($deliveryPhone)
    {
        $this->set('DELIVERY_PHONE', $deliveryPhone);

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryPhone()
    {
        return $this->get('DELIVERY_PHONE');
    }
}