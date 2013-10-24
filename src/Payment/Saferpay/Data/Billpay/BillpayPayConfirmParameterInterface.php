<?php

namespace Payment\Saferpay\Data\Billpay;

interface BillpayPayConfirmParameterInterface
{
    /**
     * optional
     */
    const COMPANY = 'ans[..50]';

    /**
     * optional, if gender is not "c"
     * the legal form of the company
     * Values: "gmbh", "ag", "misc"
     */
    const LEGALFORM = 'a[..4]';

    /**
     * optional
     * Values: "f", "m", "c" (company)
     */
    const GENDER = 'a[1]';

    const GENDER_FEMALE = 'f';
    const GENDER_MALE = 'm';
    const GENDER_COMPANY = 'c';

    /**
     * optional
     */
    const FIRSTNAME = 'ans[..50]';

    /**
     * optional
     */
    const LASTNAME = 'ans[..50]';

    /**
     * optional
     */
    const STREET = 'ans[..50]';

    /**
     * optional
     * address addition if needed
     */
    const ADDRESSADDITION = 'an[..50]';

    /**
     * optional
     */
    const ZIP = 'an[..10]';

    /**
     * optional
     */
    const CITY = 'ans[..50]';

    /**
     * optional
     * Country code according to ISO 3166.
     * @link http://support.saferpay.de/download/CountryList.pdf.
     */
    const COUNTRY = 'a[2]';

    /**
     * optional
     */
    const EMAIL = 'ans[..50]';

    /**
     * optional
     */
    const PHONE = 'ns[..20]';

    /**
     * optional
     * Limits the validity of the payment link
     * Format: YYYYMMDD
     */
    const DATEOFBIRTH = 'n[8]';

    /**
     * optional
     * Values: "f", "m", "c"
     */
    const DELIVERY_GENDER = 'a[1]';

    /**
     * optional
     */
    const DELIVERY_FIRSTNAME = 'ans[..50]';

    /**
     * optional
     */
    const DELIVERY_LASTNAME = 'ans[..50]';

    /**
     * optional
     */
    const DELIVERY_STREET = 'ans[..50]';

    /**
     * optional
     * address addition if needed
     */
    const DELIVERY_ADDRESSADDITION = 'an[..50]';

    /**
     * optional
     */
    const DELIVERY_ZIP = 'an[..10]';

    /**
     * optional
     */
    const DELIVERY_CITY = 'ans[..50]';

    /**
     * optional
     * Country code according to ISO 3166.
     * @link http://support.saferpay.de/download/CountryList.pdf.
     */
    const DELIVERY_COUNTRY = 'a[2]';

    /**
     * optional
     */
    const DELIVERY_PHONE = 'ns[..50]';

    /**
     * @param string $company
     * @return $this
     */
    public function setCompany($company);

    /**
     * @return string
     */
    public function getCompany();

    /**
     * @param string $legalform
     * @return $this
     */
    public function setLegalform($legalform);

    /**
     * @return string
     */
    public function getLegalform();

    /**
     * @param string $gender
     * @return $this
     */
    public function setGender($gender);

    /**
     * @return string
     */
    public function getGender();

    /**
     * @param string $firstname
     * @return $this
     */
    public function setFirstname($firstname);

    /**
     * @return string
     */
    public function getFirstname();

    /**
     * @param string $lastname
     * @return $this
     */
    public function setLastname($lastname);

    /**
     * @return string
     */
    public function getLastname();

    /**
     * @param string $street
     * @return $this
     */
    public function setStreet($street);

    /**
     * @return string
     */
    public function getStreet();

    /**
     * @param string $addressAddition
     * @return $this
     */
    public function setAddressAddition($addressAddition);

    /**
     * @return string
     */
    public function getAddressAddition();

    /**
     * @param string $zip
     * @return $this
     */
    public function setZip($zip);

    /**
     * @return string
     */
    public function getZip();

    /**
     * @param string $city
     * @return $this
     */
    public function setCity($city);

    /**
     * @return string
     */
    public function getCity();

    /**
     * @param string $country
     * @return $this
     */
    public function setCountry($country);

    /**
     * @return string
     */
    public function getCountry();

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail($email);

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param string $phone
     * @return $this
     */
    public function setPhone($phone);

    /**
     * @return string
     */
    public function getPhone();

    /**
     * @param int $dateofBirth
     * @return $this
     */
    public function setDateofBirth($dateofBirth);

    /**
     * @return int
     */
    public function getDateofBirth();

    /**
     * @param string $deliveryGender
     * @return $this
     */
    public function setDeliveryGender($deliveryGender);

    /**
     * @return string
     */
    public function getDeliveryGender();

    /**
     * @param string $deliveryFirstname
     * @return $this
     */
    public function setDeliveryFirstname($deliveryFirstname);

    /**
     * @return string
     */
    public function getDeliveryFirstname();

    /**
     * @param string $deliveryLastname
     * @return $this
     */
    public function setDeliveryLastname($deliveryLastname);

    /**
     * @return string
     */
    public function getDeliveryLastname();

    /**
     * @param string $deliveryStreet
     * @return $this
     */
    public function setDeliveryStreet($deliveryStreet);

    /**
     * @return string
     */
    public function getDeliveryStreet();

    /**
     * @param string $deliveryAddressAddition
     * @return $this
     */
    public function setDeliveryAddressAddition($deliveryAddressAddition);

    /**
     * @return string
     */
    public function getDeliveryAddressAddition();

    /**
     * @param string $deliveryZip
     * @return $this
     */
    public function setDeliveryZip($deliveryZip);

    /**
     * @return string
     */
    public function getDeliveryZip();

    /**
     * @param string $deliveryCity
     * @return $this
     */
    public function setDeliveryCity($deliveryCity);

    /**
     * @return string
     */
    public function getDeliveryCity();

    /**
     * @param string $deliveryCountry
     * @return $this
     */
    public function setDeliveryCountry($deliveryCountry);

    /**
     * @return string
     */
    public function getDeliveryCountry();

    /**
     * @param string $deliveryPhone
     * @return $this
     */
    public function setDeliveryPhone($deliveryPhone);

    /**
     * @return string
     */
    public function getDeliveryPhone();
}
