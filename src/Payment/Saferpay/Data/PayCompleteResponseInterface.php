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
     * @param $msgtype
     * @return mixed
     */
    public function setMsgtype($msgtype);

    /**
     * @return mixed
     */
    public function getMsgtype();

    /**
     * @param $id
     * @return mixed
     */
    public function setId($id);

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param $result
     * @return mixed
     */
    public function setResult($result);

    /**
     * @return mixed
     */
    public function getResult();

    /**
     * @param $message
     * @return mixed
     */
    public function setMessage($message);

    /**
     * @return mixed
     */
    public function getMessage();

    /**
     * @param $authmessage
     * @return mixed
     */
    public function setAuthmessage($authmessage);

    /**
     * @return mixed
     */
    public function getAuthmessage();
}
