<?php

namespace Payment\Saferpay;


interface SaferpayDataInterface
{
    /**
     * @param \ArrayAccess $data
     * @return self
     */
    public function setInitData(\ArrayAccess $data);

    /**
     * @return \ArrayAccess
     */
    public function getInitData();

    /**
     * @param \ArrayAccess $data
     * @return self
     */
    public function setConfirmData(\ArrayAccess $data);

    /**
     * @return \ArrayAccess
     */
    public function getConfirmData();

    /**
     * @param \ArrayAccess $data
     * @return self
     */
    public function setCompleteData(\ArrayAccess $data);

    /**
     * @return \ArrayAccess
     */
    public function getCompleteData();
}