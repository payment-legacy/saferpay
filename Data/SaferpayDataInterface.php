<?php

namespace Payment\Saferpay\Data;

interface SaferpayDataInterface
{
    /**
     * @param DataInterface $data
     * @return self
     */
    public function setInitData(DataInterface $data);

    /**
     * @return DataInterface
     */
    public function getInitData();

    /**
     * @param DataInterface $data
     * @return self
     */
    public function setConfirmData(DataInterface $data);

    /**
     * @return DataInterface
     */
    public function getConfirmData();

    /**
     * @param DataInterface $data
     * @return self
     */
    public function setCompleteData(DataInterface $data);

    /**
     * @return DataInterface
     */
    public function getCompleteData();
}