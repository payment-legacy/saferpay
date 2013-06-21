<?php

namespace Payment\Saferpay\Data;

class PayCompleteResponse extends AbstractData implements PayCompleteResponseWithDataInterface
{
    /**
     * @param string $msgtype
     * @return $this
     */
    public function setMsgtype($msgtype)
    {
        $this->set('MSGTYPE', $msgtype);

        return $this;
    }

    /**
     * @return string
     */
    public function getMsgtype()
    {
        return $this->get('MSGTYPE');
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        $this->set('ID', $id);

        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->get('ID');
    }

    /**
     * @param string $result
     * @return $this
     */
    public function setResult($result)
    {
        $this->set('RESULT', $result);

        return $this;
    }

    /**
     * @return string
     */
    public function getResult()
    {
        return $this->get('RESULT');
    }

    /**
     * @param string $message
     * @return $this
     */
    public function setMessage($message)
    {
        $this->set('MESSAGE', $message);

        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->get('MESSAGE');
    }

    /**
     * @param string $authmessage
     * @return $this
     */
    public function setAuthmessage($authmessage)
    {
        $this->set('AUTHMESSAGE', $authmessage);

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthmessage()
    {
        return $this->get('AUTHMESSAGE');
    }
}
