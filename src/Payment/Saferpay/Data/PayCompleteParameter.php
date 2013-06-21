<?php

namespace Payment\Saferpay\Data;

class PayCompleteParameter extends AbstractData implements PayCompleteParameterWithDataInterface
{
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
     * @param string $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->set('AMOUNT', $amount);

        return $this;
    }

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->get('AMOUNT');
    }

    /**
     * @param string $accountid
     * @return $this
     */
    public function setAccountid($accountid)
    {
        $this->set('ACCOUNTID', $accountid);

        return $this;
    }

    /**
     * @return string
     */
    public function getAccountid()
    {
        return $this->get('ACCOUNTID');
    }

    /**
     * @param string $action
     * @return $this
     */
    public function setAction($action)
    {
        $this->set('ACTION', $action);

        return $this;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->get('ACTION');
    }
}
