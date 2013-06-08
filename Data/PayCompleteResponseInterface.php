<?php

namespace Payment\Saferpay\Data;

interface PayCompleteResponseInterface
{
    /**
     * Always contains the value "PayConfirm".
     */
    const MSGTYPE = 'a[..30]';

    /**
     * Saferpay unique transaction identifier.
     */
    const ID = 'an[28]';

    /**
     * Contains the result of the PayComplete request.
     * Anything else than 0 is a error
     */
    const RESULT = 'n[..4]';

    /**
     * Contains the result of the PayComplete request as a text
     */
    const MESSAGE = 'ans[..30]';

    /**
     * Can contain a response tho the accounting request as a text
     */
    const AUTHMESSAGE = 'ans[..30]';
}