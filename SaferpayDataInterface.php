<?php

namespace Payment\Saferpay;


interface SaferpayDataInterface
{
    /**
     * @param \ArrayObject $data
     * @return self
     */
    public function setInitData(\ArrayObject $data);

    /**
     * @return \ArrayObject
     */
    public function getInitData();

    /**
     * @param \ArrayObject $data
     * @return self
     */
    public function setConfirmData(\ArrayObject $data);

    /**
     * @return \ArrayObject
     */
    public function getConfirmData();

    /**
     * @param \ArrayObject $data
     * @return self
     */
    public function setCompleteData(\ArrayObject $data);

    /**
     * @return \ArrayObject
     */
    public function getCompleteData();
}