<?php

namespace Payment\Saferpay\Data;

interface PayCompleteParameterInterface
{
    const REQUEST_URL = 'https://www.saferpay.com/hosting/PayCompleteV2.asp';

    /**
     * Saferpay unique transaction identifier.
     * Mandatory parameter, unless ACTION = Close Batch.
     */
    const ID = 'an[28]';

    /**
     * Payment amount in the smallest currency unit.
     * For example, "1230" corresponding amount in euro 12,30.
     */
    const AMOUNT = 'n[..8]';

    /**
     * The Saferpay account number for this merchant Transaction.
     * For example, "99867-94913159" for the Saferpay test account
     */
    const ACCOUNTID = 'ns[..15]';

    /**
     * optional
     * Specifies an extended processing option.
     * Possible values ​​are: "Settlement", "CloseBatch", "Cancel", default: "Settlement"
     */
    const ACTION = 'a[..11]';

    const ACTION_SETTLEMENT = 'Settlement';
    const ACTION_CLOSEBATCH = 'CloseBatch';
    const ACTION_CANCEL = 'Cancel';
}
