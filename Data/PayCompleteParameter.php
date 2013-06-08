<?php

namespace Payment\Saferpay\Data;

class PayCompleteParameter extends AbstractData implements PayCompleteParameterInterface
{
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
     * @param int $AMOUNT
     * @return $this
     */
    public function setAMOUNT($AMOUNT)
    {
        $this->set('AMOUNT', $AMOUNT);
        return $this;
    }

    /**
     * @return int
     */
    public function getAMOUNT()
    {
        return $this->get('AMOUNT');
    }

    /**
     * @param string $ACCOUNTID
     * @return $this
     */
    public function setACCOUNTID($ACCOUNTID)
    {
        $this->set('ACCOUNTID', $ACCOUNTID);
        return $this;
    }

    /**
     * @return string
     */
    public function getACCOUNTID()
    {
        return $this->get('ACCOUNTID');
    }

    /**
     * @param string $ACTION
     * @return $this
     */
    public function setACTION($ACTION)
    {
        $this->set('ACTION', $ACTION);
        return $this;
    }

    /**
     * @return string
     */
    public function getACTION()
    {
        return $this->get('ACTION');
    }
}