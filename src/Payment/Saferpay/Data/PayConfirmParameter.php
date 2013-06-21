<?php

namespace Payment\Saferpay\Data;

class PayConfirmParameter extends AbstractData implements PayConfirmParameterWithDataInterface
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
     * @param string $vtverify
     * @return $this
     */
    public function setVtverify($vtverify)
    {
        $this->set('VTVERIFY', $vtverify);

        return $this;
    }

    /**
     * @return string
     */
    public function getVtverify()
    {
        return $this->get('VTVERIFY');
    }

    /**
     * @param string $keyid
     * @return $this
     */
    public function setKeyid($keyid)
    {
        $this->set('KEYID', $keyid);

        return $this;
    }

    /**
     * @return string
     */
    public function getKeyid()
    {
        return $this->get('KEYID');
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
     * @param string $token
     * @return $this
     */
    public function setToken($token)
    {
        $this->set('TOKEN', $token);

        return $this;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->get('TOKEN');
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
     * @param string $currency
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->set('CURRENCY', $currency);

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->get('CURRENCY');
    }

    /**
     * @param string $cardrefid
     * @return $this
     */
    public function setCardrefid($cardrefid)
    {
        $this->set('CARDREFID', $cardrefid);

        return $this;
    }

    /**
     * @return string
     */
    public function getCardrefid()
    {
        return $this->get('CARDREFID');
    }

    /**
     * @param string $scdresult
     * @return $this
     */
    public function setScdresult($scdresult)
    {
        $this->set('SCDRESULT', $scdresult);

        return $this;
    }

    /**
     * @return string
     */
    public function getScdresult()
    {
        return $this->get('SCDRESULT');
    }

    /**
     * @param string $providerid
     * @return $this
     */
    public function setProviderid($providerid)
    {
        $this->set('PROVIDERID', $providerid);

        return $this;
    }

    /**
     * @return string
     */
    public function getProviderid()
    {
        return $this->get('PROVIDERID');
    }

    /**
     * @param string $providername
     * @return $this
     */
    public function setProvidername($providername)
    {
        $this->set('PROVIDERNAME', $providername);

        return $this;
    }

    /**
     * @return string
     */
    public function getProvidername()
    {
        return $this->get('PROVIDERNAME');
    }

    /**
     * @param string $orderid
     * @return $this
     */
    public function setOrderid($orderid)
    {
        $this->set('ORDERID', $orderid);

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderid()
    {
        return $this->get('ORDERID');
    }

    /**
     * @param string $ip
     * @return $this
     */
    public function setIp($ip)
    {
        $this->set('IP', $ip);

        return $this;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->get('IP');
    }

    /**
     * @param string $ipcountry
     * @return $this
     */
    public function setIpcountry($ipcountry)
    {
        $this->set('IPCOUNTRY', $ipcountry);

        return $this;
    }

    /**
     * @return string
     */
    public function getIpcountry()
    {
        return $this->get('IPCOUNTRY');
    }

    /**
     * @param string $cccountry
     * @return $this
     */
    public function setCccountry($cccountry)
    {
        $this->set('CCCOUNTRY', $cccountry);

        return $this;
    }

    /**
     * @return string
     */
    public function getCccountry()
    {
        return $this->get('CCCOUNTRY');
    }

    /**
     * @param string $mpi_liabilityshift
     * @return $this
     */
    public function setMpiliabilityshift($mpi_liabilityshift)
    {
        $this->set('MPI_LIABILITYSHIFT', $mpi_liabilityshift);

        return $this;
    }

    /**
     * @return string
     */
    public function getMpiliabilityshift()
    {
        return $this->get('MPI_LIABILITYSHIFT');
    }

    /**
     * @param string $eci
     * @return $this
     */
    public function setEci($eci)
    {
        $this->set('ECI', $eci);

        return $this;
    }

    /**
     * @return string
     */
    public function getEci()
    {
        return $this->get('ECI');
    }

    /**
     * @param string $xid
     * @return $this
     */
    public function setXid($xid)
    {
        $this->set('XID', $xid);

        return $this;
    }

    /**
     * @return string
     */
    public function getXid()
    {
        return $this->get('XID');
    }

    /**
     * @param string $cavv
     * @return $this
     */
    public function setCavv($cavv)
    {
        $this->set('CAVV', $cavv);

        return $this;
    }

    /**
     * @return string
     */
    public function getCavv()
    {
        return $this->get('CAVV');
    }
}
