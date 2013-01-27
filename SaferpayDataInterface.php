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
     * @param SaferpayKeyValueInterface $data
     * @return self
     */
    public function setInitData(SaferpayKeyValueInterface $data);

    /**
     * @return SaferpayKeyValueInterface
     */
    public function getInitData();

    /**
     * @param SaferpayKeyValueInterface $data
     * @return self
     */
    public function setConfirmData(SaferpayKeyValueInterface $data);

    /**
     * @return SaferpayKeyValueInterface
     */
    public function getConfirmData();

    /**
     * @param SaferpayKeyValueInterface $data
     * @return self
     */
    public function setCompleteData(SaferpayKeyValueInterface $data);

    /**
     * @return SaferpayKeyValueInterface
     */
    public function getCompleteData();

    /**
     * @param SaferpayKeyValueInterface $keyValuePrototype
     * @return Saferpay
     */
    public function setKeyValuePrototype(SaferpayKeyValueInterface $keyValuePrototype);

    /**
     * @return SaferpayKeyValueInterface
     */
    public function getKeyValuePrototype();
}