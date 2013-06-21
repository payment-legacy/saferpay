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

    /**
     * @param string $msgtype
     * @return $this
     */
    public function setMsgtype($msgtype);

    /**
     * @return string
     */
    public function getMsgtype();

    /**
     * @param string $id
     * @return $this
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getId();

    /**
     * @param string $result
     * @return $this
     */
    public function setResult($result);

    /**
     * @return string
     */
    public function getResult();

    /**
     * @param string $message
     * @return $this
     */
    public function setMessage($message);

    /**
     * @return string
     */
    public function getMessage();

    /**
     * @param string $authmessage
     * @return $this
     */
    public function setAuthmessage($authmessage);

    /**
     * @return string
     */
    public function getAuthmessage();
}
