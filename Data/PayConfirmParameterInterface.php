<?php

namespace Payment\Saferpay\Data;

interface PayConfirmParameterInterface
{
    const REQUEST_URL = 'https://www.saferpay.com/hosting/VerifyPayConfirm.asp';

    /**
     * Always contains the value "PayConfirm".
     */
    const MSGTYPE = 'a[..30]';

    /**
     * Can Contain additional information about the transaction processing
     * Default value: "(obsolete)"
     */
    const VTVERIFY = 'ans[..40]';

    /**
     * Identifier of the key with which the signature was created.
     */
    const KEYID = 'ans[..40]';

    /**
     * Saferpay unique transaction identifier.
     */
    const ID = 'an[28]';

    /**
     * Can Contain additional information about the transaction processing
     * Default value: "(unused))"
     */
    const TOKEN = 'ans[..40]';

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
     * optional, only if the parameter CARDREFID in the CreatePayInit call was given
     * Contains the replacement value for the credit card number and the expiration date or bank (only german ELV)
     */
    const CARDREFID = 'ans[..40]';

    /**
     * optional, only if the parameter CARDREFID in the CreatePayInit call was given
     * Contains the response code of the registration in the SCD
     */
    const SCDRESULT = 'n[..4]';

    const SCDRESULT_OK = 1;
    const SCDRESULT_GENERAL_ERROR = 7000;
    const SCDRESULT_REQUEST_PROCESS_ERROR = 7001;
    const SCDRESULT_CARDTYPE_NOT_AVAILABLE = 7002;
    const SCDRESULT_INVALID_DATA_OR_FORMAT = 7003;
    const SCDRESULT_CARDREFID_NOTFOUND = 7004;
    const SCDRESULT_MISSING_PARAMETER = 7005;
    const SCDRESULT_CARDREFID_ALLREADY_EXISTS = 7006;
    const SCDRESULT_NO_AUTHORIZATION_FOR_SCD = 7007;

    /**
     * Contains the ID of the provider payment processor.
     */
    const PROVIDERID = 'n[..4]';

    /**
     * Contains the name of the payment processor.
     */
    const PROVIDERNAME = 'ans[..30]';

    /**
     * optional, mandatory parameters when payment giropay
     * ORDERID contains the reference number for a payment
     */
    const ORDERID = 'an[..39]';

    /**
     * optional*
     * Contains the client's IP address. Only available for existing Saferpay Risk Management
     */
    const IP = 'ns[..15]';

    /**
     * optional*
     * Country of origin of the IP address of the payer in accordance with ISO 3166.
     * Is not an assignment possible, the value is "IX".
     * @link http://support.saferpay.de/download/CountryList.pdf.
     */
    const IPCOUNTRY = 'a[2]';

    /**
     * optional*
     * Country of origin of the IP address of the payer in accordance with ISO 3166.
     * Is not an assignment possible, CCCOUNTRYis not in the response included.
     * @link http://support.saferpay.de/download/CountryList.pdf.
     */
    const CCCOUNTRY = 'a[2]';

    /**
     * optional**
     * Specifies whether a liability shift is technically formally. Values​​: "yes" or "no"
     * Because there are providers do not offer this liability shift there is no GUARANTEE
     */
    const MPI_LIABILITYSHIFT = 'a[..3]';

    /**
     * optional**
     * Electronic Commerce Indicator
     */
    const ECI = 'n[1]';

    const ECI_NO_LIABILITY_SHIFT = 0;
    const ECI_3D_SECURE_PAYMENT_WITH_AUTHENTICATION = 1;
    const ECI_3D_SECURE_PAYMENT_CARD_NOT_SUPPORTED = 2;

    /**
     * optional**
     * This Base64 string is assigned by the MPI and referenced to the process in 3-D Secure protocol.
     */
    const XID = 'ans[28]';

    /**
     * optional**
     * Cardholder Authentication Verification Value
     * With MasterCard the value contains UCAF, with American Express the value contains AEVV,
     * saferpay use regardless from the card type the value CAVV
     */
    const CAVV = 'ans[28]';

    // * Only available for existing Saferpay Risk Management
    // ** 3-D Secure parameter, a participate to the 3-D Secure method is prerequisite
}
