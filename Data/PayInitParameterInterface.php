<?php

namespace Payment\Saferpay\Data;

interface PayInitParameterInterface
{
    const REQUEST_URL = 'https://www.saferpay.com/hosting/CreatePayInit.asp';

    /**
     * The Saferpay account number for this merchant Transaction.
     * For example, "99867-94913159" for the Saferpay test account
     */
    const ACCOUNTID = 'ns[..15]';

    /**
     * Payment amount in the smallest currency unit.
     * For example, "1230" corresponding amount in euro 12,30.
     */
    const AMOUNT = 'n[..8]';

    /**
     * Three-digit ISO 4217 currency code.
     * For example, "CHF" or "EUR"
     */
    const CURRENCY = 'a[3]';

    /**
     * Contains a description of the offer
     */
    const DESCRIPTION = 'ans[..50]';

    /**
     * optional, mandatory parameters when payment giropay
     * ORDERID contains the reference number for a payment
     */
    const ORDERID = 'ans[..80]';

    /**
     * optional
     * VTCONFIG determines the configuration to be used for the PP.
     * Various configurations for the PP can be created in Saferpay BackOffice.
     */
    const VTCONFIG = 'an[..20]';

    /**
     * URL to which the customer get redirected after a successful completion
     */
    const SUCCESSLINK = 'ans[..1024]';

    /**
     * URL to which the customer get redirected after a failed authorization
     */
    const FAILLINK = 'ans[..1024]';

    /**
     * URL to which the customer get redirected after a cancel a transaction
     */
    const BACKLINK = 'ans[..1024]';

    /**
     * optional
     * Fully qualified URL which saferpay transmitted POST data after successful authorization
     */
    const NOTIFYURL = 'ans[..1024]';

    /**
     * optional
     * Closes the PP after successful authorization automatically and calls on the SUCCESS LINK. Default 0
     */
    const AUTOCLOSE = 'n[..2]';

    /**
     * optional
     * Enable the field to enter the cardholder's name in the PP. Values​​: "yes" or "no"
     */
    const CCNAME = 'a[..3]';

    /**
     * optional
     * Email address of the dealer. Saferpay send a confirmation e-mail to this address.
     */
    const NOTIFYADDRESS = 'ans[..50]';

    /**
     * optional
     * Email address of the client. Saferpay send a confirmation e-mail to this address.
     */
    const USERNOTIFY = 'ans[..50]';

    /**
     * optional
     * Language code according to ISO 639-1.
     * @link http://support.saferpay.de/download/LanguageList.pdf.
     */
    const LANGID = 'a[2]';

    /**
     * optional
     * Activates the language selection menu in PP. Values​​: "yes" or "no"
     */
    const SHOWLANGUAGES = 'a[..3]';

    /**
     * optional
     * Specifies those payment methods displayed in the PP payment.
     * By default all activated methods are displayed
     */
    const PAYMENTMETHODS = 'ns[..40]';

    const PAYMENTMETHOD_MASTERCARD = 1;
    const PAYMENTMETHOD_VISA = 2;
    const PAYMENTMETHOD_AMERICAN_EXPRESS = 3;
    const PAYMENTMETHOD_DINERSCLUB = 4;
    const PAYMENTMETHOD_JCB = 5;
    const PAYMENTMETHOD_SAFERPAY_TESTCARD = 6;
    const PAYMENTMETHOD_LASER_CARD = 7;
    const PAYMENTMETHOD_BONUS_CARD = 8;
    const PAYMENTMETHOD_POSTFINANCE_E_FINANCE = 9;
    const PAYMENTMETHOD_POSTFINANCE_CARD = 10;
    const PAYMENTMETHOD_MAESTRO_INTERNATIONAL = 11;
    const PAYMENTMETHOD_MYONE = 12;
    const PAYMENTMETHOD_DIRECTDEBIT = 13;
    const PAYMENTMETHOD_INVOICE = 14;
    const PAYMENTMETHOD_IMMEDIATE_TRANSFER = 15;
    const PAYMENTMETHOD_PAYPAL = 16;
    const PAYMENTMETHOD_GIROPAY = 17;
    const PAYMENTMETHOD_IDEAL = 18;
    const PAYMENTMETHOD_CLICK_N_BUY = 19;
    const PAYMENTMETHOD_HOMEBANKING_AT = 20;
    const PAYMENTMETHOD_MPASS = 21;

    /**
     * optional
     * Limits the validity of the payment link
     * Format: YYYYMMDDhhmmss
     */
    const DURATION = 'n[14]';

    /**
     * optional
     * Replacement value for the credit card number and the expiration date or bank (only german ELV)
     * For the use of CARDREFID="new" must at first set a numeric start default value for the Saferpay account
     * Contact integration@saferpay.com
     */
    const CARDREFID = 'ans[..40]';

    /**
     * optional
     * Displays the address form in PP. Values​​: "yes" or "no"
     */
    const DELIVERY = 'a[..3]';

    /**
     * optional
     * Does the appearance of the PP indicating display. Values: "auto" (default), "mobile", "desktop"
     */
    const APPEARANCE = 'an[..7]';

    /**
     * optional
     * Specifies whether an address form is for delivery, customer or billing address.
     * Values: "DELIVERY", "CUSTOMER", "BILLING"
     */
    const ADDRESS = 'a[..8]';

    /**
     * optional
     */
    const COMPANY = 'ans[..50]';

    /**
     * optional
     * Values: "f", "m", "c" (company)
     */
    const GENDER = 'a[1]';

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
}