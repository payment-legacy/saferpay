<?php

namespace Payment\Saferpay\Data\Billpay;

use Payment\Saferpay\Data\AbstractGetSet;
use Payment\Saferpay\Data\SubBaseInterface;

class BillpayPayCompleteParameter extends AbstractGetSet implements BillpayPayCompleteParameterInterface, SubBaseInterface
{
    /**
     * @param string $popDeplay
     * @return $this
     */
    public function setPobDelay($popDeplay)
    {
        $this->set('POB_DELAY', $popDeplay);

        return $this;
    }

    /**
     * @return string
     */
    public function getPobDelay()
    {
        return $this->get('POB_DELAY');
    }
}