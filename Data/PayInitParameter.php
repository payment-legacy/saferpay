<?php

namespace Payment\Saferpay\Data;

class PayInitParameter extends AbstractData implements PayInitParameterInterface
{
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
     * @param string $DESCRIPTION
     * @return $this
     */
    public function setDESCRIPTION($DESCRIPTION)
    {
        $this->set('DESCRIPTION', $DESCRIPTION);
        return $this;
    }

    /**
     * @return string
     */
    public function getDESCRIPTION()
    {
        return $this->get('DESCRIPTION');
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
     * @param string $VTCONFIG
     * @return $this
     */
    public function setVTCONFIG($VTCONFIG)
    {
        $this->set('VTCONFIG', $VTCONFIG);
        return $this;
    }

    /**
     * @return string
     */
    public function getVTCONFIG()
    {
        return $this->get('VTCONFIG');
    }

    /**
     * @param string $SUCCESSLINK
     * @return $this
     */
    public function setSUCCESSLINK($SUCCESSLINK)
    {
        $this->set('SUCCESSLINK', $SUCCESSLINK);
        return $this;
    }

    /**
     * @return string
     */
    public function getSUCCESSLINK()
    {
        return $this->get('SUCCESSLINK');
    }

    /**
     * @param string $FAILLINK
     * @return $this
     */
    public function setFAILLINK($FAILLINK)
    {
        $this->set('FAILLINK', $FAILLINK);
        return $this;
    }

    /**
     * @return string
     */
    public function getFAILLINK()
    {
        return $this->get('FAILLINK');
    }

    /**
     * @param string $BACKLINK
     * @return $this
     */
    public function setBACKLINK($BACKLINK)
    {
        $this->set('BACKLINK', $BACKLINK);
        return $this;
    }

    /**
     * @return string
     */
    public function getBACKLINK()
    {
        return $this->get('BACKLINK');
    }

    /**
     * @param string $NOTIFYURL
     * @return $this
     */
    public function setNOTIFYURL($NOTIFYURL)
    {
        $this->set('NOTIFYURL', $NOTIFYURL);
        return $this;
    }

    /**
     * @return string
     */
    public function getNOTIFYURL()
    {
        return $this->get('NOTIFYURL');
    }

    /**
     * @param int $AUTOCLOSE
     * @return $this
     */
    public function setAUTOCLOSE($AUTOCLOSE)
    {
        $this->set('AUTOCLOSE', $AUTOCLOSE);
        return $this;
    }

    /**
     * @return int
     */
    public function getAUTOCLOSE()
    {
        return $this->get('AUTOCLOSE');
    }

    /**
     * @param string $CCNAME
     * @return $this
     */
    public function setCCNAME($CCNAME)
    {
        $this->set('CCNAME', $CCNAME);
        return $this;
    }

    /**
     * @return string
     */
    public function getCCNAME()
    {
        return $this->get('CCNAME');
    }

    /**
     * @param string $NOTIFYADDRESS
     * @return $this
     */
    public function setNOTIFYADDRESS($NOTIFYADDRESS)
    {
        $this->set('NOTIFYADDRESS', $NOTIFYADDRESS);
        return $this;
    }

    /**
     * @return string
     */
    public function getNOTIFYADDRESS()
    {
        return $this->get('NOTIFYADDRESS');
    }

    /**
     * @param string $USERNOTIFY
     * @return $this
     */
    public function setUSERNOTIFY($USERNOTIFY)
    {
        $this->set('USERNOTIFY', $USERNOTIFY);
        return $this;
    }

    /**
     * @return string
     */
    public function getUSERNOTIFY()
    {
        return $this->get('USERNOTIFY');
    }

    /**
     * @param string $LANGID
     * @return $this
     */
    public function setLANGID($LANGID)
    {
        $this->set('LANGID', $LANGID);
        return $this;
    }

    /**
     * @return string
     */
    public function getLANGID()
    {
        return $this->get('LANGID');
    }

    /**
     * @param string $SHOWLANGUAGES
     * @return $this
     */
    public function setSHOWLANGUAGES($SHOWLANGUAGES)
    {
        $this->set('SHOWLANGUAGES', $SHOWLANGUAGES);
        return $this;
    }

    /**
     * @return string
     */
    public function getSHOWLANGUAGES()
    {
        return $this->get('SHOWLANGUAGES');
    }

    /**
     * @param string $PAYMENTMETHODS
     * @return $this
     */
    public function setPAYMENTMETHODS($PAYMENTMETHODS)
    {
        $this->set('PAYMENTMETHODS', $PAYMENTMETHODS);
        return $this;
    }

    /**
     * @return string
     */
    public function getPAYMENTMETHODS()
    {
        return $this->get('PAYMENTMETHODS');
    }

    /**
     * @param int $DURATION
     * @return $this
     */
    public function setDURATION($DURATION)
    {
        $this->set('DURATION', $DURATION);
        return $this;
    }

    /**
     * @return int
     */
    public function getDURATION()
    {
        return $this->get('DURATION');
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
     * @param string $DELIVERY
     * @return $this
     */
    public function setDELIVERY($DELIVERY)
    {
        $this->set('DELIVERY', $DELIVERY);
        return $this;
    }

    /**
     * @return string
     */
    public function getDELIVERY()
    {
        return $this->get('DELIVERY');
    }

    /**
     * @param string $APPEARANCE
     * @return $this
     */
    public function setAPPEARANCE($APPEARANCE)
    {
        $this->set('APPEARANCE', $APPEARANCE);
        return $this;
    }

    /**
     * @return string
     */
    public function getAPPEARANCE()
    {
        return $this->get('APPEARANCE');
    }

    /**
     * @param string $ADDRESS
     * @return $this
     */
    public function setADDRESS($ADDRESS)
    {
        $this->set('ADDRESS', $ADDRESS);
        return $this;
    }

    /**
     * @return string
     */
    public function getADDRESS()
    {
        return $this->get('ADDRESS');
    }

    /**
     * @param string $COMPANY
     * @return $this
     */
    public function setCOMPANY($COMPANY)
    {
        $this->set('COMPANY', $COMPANY);
        return $this;
    }

    /**
     * @return string
     */
    public function getCOMPANY()
    {
        return $this->get('COMPANY');
    }

    /**
     * @param string $GENDER
     * @return $this
     */
    public function setGENDER($GENDER)
    {
        $this->set('GENDER', $GENDER);
        return $this;
    }

    /**
     * @return string
     */
    public function getGENDER()
    {
        return $this->get('GENDER');
    }

    /**
     * @param string $FIRSTNAME
     * @return $this
     */
    public function setFIRSTNAME($FIRSTNAME)
    {
        $this->set('FIRSTNAME', $FIRSTNAME);
        return $this;
    }

    /**
     * @return string
     */
    public function getFIRSTNAME()
    {
        return $this->get('FIRSTNAME');
    }

    /**
     * @param string $LASTNAME
     * @return $this
     */
    public function setLASTNAME($LASTNAME)
    {
        $this->set('LASTNAME', $LASTNAME);
        return $this;
    }

    /**
     * @return string
     */
    public function getLASTNAME()
    {
        return $this->get('LASTNAME');
    }

    /**
     * @param string $STREET
     * @return $this
     */
    public function setSTREET($STREET)
    {
        $this->set('STREET', $STREET);
        return $this;
    }

    /**
     * @return string
     */
    public function getSTREET()
    {
        return $this->get('STREET');
    }

    /**
     * @param string $ZIP
     * @return $this
     */
    public function setZIP($ZIP)
    {
        $this->set('ZIP', $ZIP);
        return $this;
    }

    /**
     * @return string
     */
    public function getZIP()
    {
        return $this->get('ZIP');
    }

    /**
     * @param string $CITY
     * @return $this
     */
    public function setCITY($CITY)
    {
        $this->set('CITY', $CITY);
        return $this;
    }

    /**
     * @return string
     */
    public function getCITY()
    {
        return $this->get('CITY');
    }

    /**
     * @param string $COUNTRY
     * @return $this
     */
    public function setCOUNTRY($COUNTRY)
    {
        $this->set('COUNTRY', $COUNTRY);
        return $this;
    }

    /**
     * @return string
     */
    public function getCOUNTRY()
    {
        return $this->get('COUNTRY');
    }

    /**
     * @param string $EMAIL
     * @return $this
     */
    public function setEMAIL($EMAIL)
    {
        $this->set('EMAIL', $EMAIL);
        return $this;
    }

    /**
     * @return string
     */
    public function getEMAIL()
    {
        return $this->get('EMAIL');
    }

    /**
     * @param string $PHONE
     * @return $this
     */
    public function setPHONE($PHONE)
    {
        $this->set('PHONE', $PHONE);
        return $this;
    }

    /**
     * @return string
     */
    public function getPHONE()
    {
        return $this->get('PHONE');
    }
}