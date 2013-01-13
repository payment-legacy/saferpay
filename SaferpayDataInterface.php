<?php

namespace Payment\Saferpay;


interface SaferpayDataInterface
{
    /**
     * @param string $signature
     * @return self
     */
    public function setInitSignature($signature);

    /**
     * @return string
     */
    public function getInitSignature();

    /**
     * @param string $signature
     * @return self
     */
    public function setConfirmSignature($signature);

    /**
     * @return string
     */
    public function getConfirmSignature();

    /**
     * @param string $signature
     * @return self
     */
    public function setCompleteSignature($signature);

    /**
     * @return string
     */
    public function getCompleteSignature();

    /**
     * @param SaferpayKeyValue $data
     * @return self
     */
    public function setInitData(SaferpayKeyValue $data);

    /**
     * @return SaferpayKeyValue
     */
    public function getInitData();

    /**
     * @param SaferpayKeyValue $data
     * @return self
     */
    public function setConfirmData(SaferpayKeyValue $data);

    /**
     * @return SaferpayKeyValue
     */
    public function getConfirmData();

    /**
     * @param SaferpayKeyValue $data
     * @return self
     */
    public function setCompleteData(SaferpayKeyValue $data);

    /**
     * @return SaferpayKeyValue
     */
    public function getCompleteData();
}