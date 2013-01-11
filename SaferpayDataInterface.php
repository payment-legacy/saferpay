<?php

namespace Payment\Saferpay;


interface SaferpayDataInterface
{
    /**
     * @param SaferpayAttribute $data
     * @return self
     */
    public function setInitData(SaferpayAttribute $data);

    /**
     * @return SaferpayAttribute
     */
    public function getInitData();

    /**
     * @param SaferpayAttribute $data
     * @return self
     */
    public function setConfirmData(SaferpayAttribute $data);

    /**
     * @return SaferpayAttribute
     */
    public function getConfirmData();

    /**
     * @param SaferpayAttribute $data
     * @return self
     */
    public function setCompleteData(SaferpayAttribute $data);

    /**
     * @return SaferpayAttribute
     */
    public function getCompleteData();
}