<?php

namespace Payment\Saferpay\Data;

class PayConfirmParameter extends AbstractData implements PayConfirmParameterInterface
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
     * @param string $VTVERIFY
     * @return $this
     */
    public function setVTVERIFY($VTVERIFY)
    {
        $this->set('VTVERIFY', $VTVERIFY);
        return $this;
    }

    /**
     * @return string
     */
    public function getVTVERIFY()
    {
        return $this->get('VTVERIFY');
    }

    /**
     * @param string $KEYID
     * @return $this
     */
    public function setKEYID($KEYID)
    {
        $this->set('KEYID', $KEYID);
        return $this;
    }

    /**
     * @return string
     */
    public function getKEYID()
    {
        return $this->get('KEYID');
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
     * @param string $TOKEN
     * @return $this
     */
    public function setTOKEN($TOKEN)
    {
        $this->set('TOKEN', $TOKEN);
        return $this;
    }

    /**
     * @return string
     */
    public function getTOKEN()
    {
        return $this->get('TOKEN');
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
     * @param string $CURRENCY
     * @return $this
     */
    public function setCURRENCY($CURRENCY)
    {
        $this->set('CURRENCY', $CURRENCY);
        return $this;
    }

    /**
     * @return string
     */
    public function getCURRENCY()
    {
        return $this->get('CURRENCY');
    }

    /**
     * @param string $CARDREFID
     * @return $this
     */
    public function setCARDREFID($CARDREFID)
    {
        $this->set('CARDREFID', $CARDREFID);
        return $this;
    }

    /**
     * @return string
     */
    public function getCARDREFID()
    {
        return $this->get('CARDREFID');
    }

    /**
     * @param int $SCDRESULT
     * @return $this
     */
    public function setSCDRESULT($SCDRESULT)
    {
        $this->set('SCDRESULT', $SCDRESULT);
        return $this;
    }

    /**
     * @return int
     */
    public function getSCDRESULT()
    {
        return $this->get('SCDRESULT');
    }

    /**
     * @param int $PROVIDERID
     * @return $this
     */
    public function setPROVIDERID($PROVIDERID)
    {
        $this->set('PROVIDERID', $PROVIDERID);
        return $this;
    }

    /**
     * @return int
     */
    public function getPROVIDERID()
    {
        return $this->get('PROVIDERID');
    }

    /**
     * @param string $PROVIDERNAME
     * @return $this
     */
    public function setPROVIDERNAME($PROVIDERNAME)
    {
        $this->set('PROVIDERNAME', $PROVIDERNAME);
        return $this;
    }

    /**
     * @return string
     */
    public function getPROVIDERNAME()
    {
        return $this->get('PROVIDERNAME');
    }

    /**
     * @param string $ORDERID
     * @return $this
     */
    public function setORDERID($ORDERID)
    {
        $this->set('ORDERID', $ORDERID);
        return $this;
    }

    /**
     * @return string
     */
    public function getORDERID()
    {
        return $this->get('ORDERID');
    }

    /**
     * @param string $IP
     * @return $this
     */
    public function setIP($IP)
    {
        $this->set('IP', $IP);
        return $this;
    }

    /**
     * @return string
     */
    public function getIP()
    {
        return $this->get('IP');
    }

    /**
     * @param string $IPCOUNTRY
     * @return $this
     */
    public function setIPCOUNTRY($IPCOUNTRY)
    {
        $this->set('IPCOUNTRY', $IPCOUNTRY);
        return $this;
    }

    /**
     * @return string
     */
    public function getIPCOUNTRY()
    {
        return $this->get('IPCOUNTRY');
    }

    /**
     * @param string $CCCOUNTRY
     * @return $this
     */
    public function setCCCOUNTRY($CCCOUNTRY)
    {
        $this->set('CCCOUNTRY', $CCCOUNTRY);
        return $this;
    }

    /**
     * @return string
     */
    public function getCCCOUNTRY()
    {
        return $this->get('CCCOUNTRY');
    }

    /**
     * @param string $MPI_LIABILITYSHIFT
     * @return $this
     */
    public function setMPILIABILITYSHIFT($MPI_LIABILITYSHIFT)
    {
        $this->set('MPI_LIABILITYSHIFT', $MPI_LIABILITYSHIFT);
        return $this;
    }

    /**
     * @return string
     */
    public function getMPILIABILITYSHIFT()
    {
        return $this->get('MPI_LIABILITYSHIFT');
    }

    /**
     * @param int $ECI
     * @return $this
     */
    public function setECI($ECI)
    {
        $this->set('ECI', $ECI);
        return $this;
    }

    /**
     * @return int
     */
    public function getECI()
    {
        return $this->get('ECI');
    }

    /**
     * @param string $XID
     * @return $this
     */
    public function setXID($XID)
    {
        $this->set('XID', $XID);
        return $this;
    }

    /**
     * @return string
     */
    public function getXID()
    {
        return $this->get('XID');
    }

    /**
     * @param string $CAVV
     * @return $this
     */
    public function setCAVV($CAVV)
    {
        $this->set('CAVV', $CAVV);
        return $this;
    }

    /**
     * @return string
     */
    public function getCAVV()
    {
        return $this->get('CAVV');
    }
}