<?php

namespace Payment\Saferpay\Data;

class PayCompleteResponse extends AbstractData implements PayCompleteResponseInterface
{
    /**
     * @param string $MSGTYPE
     * @return $this
     */
    public function setMSGTYPE($MSGTYPE)
    {
        $this->set('MSGTYPE', $MSGTYPE);
        return $this;
    }

    /**
     * @return string
     */
    public function getMSGTYPE()
    {
        return $this->get('MSGTYPE');
    }

    /**
     * @param string $ID
     * @return $this
     */
    public function setID($ID)
    {
        $this->set('ID', $ID);
        return $this;
    }

    /**
     * @return string
     */
    public function getID()
    {
        return $this->get('ID');
    }

    /**
     * @param int $RESULT
     * @return $this
     */
    public function setRESULT($RESULT)
    {
        $this->set('RESULT', $RESULT);
        return $this;
    }

    /**
     * @return int
     */
    public function getRESULT()
    {
        return $this->get('RESULT');
    }

    /**
     * @param string $MESSAGE
     * @return $this
     */
    public function setMESSAGE($MESSAGE)
    {
        $this->set('MESSAGE', $MESSAGE);
        return $this;
    }

    /**
     * @return string
     */
    public function getMESSAGE()
    {
        return $this->get('MESSAGE');
    }

    /**
     * @param string $AUTHMESSAGE
     * @return $this
     */
    public function setAUTHMESSAGE($AUTHMESSAGE)
    {
        $this->set('AUTHMESSAGE', $AUTHMESSAGE);
        return $this;
    }

    /**
     * @return string
     */
    public function getAUTHMESSAGE()
    {
        return $this->get('AUTHMESSAGE');
    }
}