<?php

namespace Payment\Saferpay;


interface SaferpayDataInterface
{
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