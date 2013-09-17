<?php

namespace Payment\Saferpay\Data\Billpay;

interface BillpayPayCompleteParameterInterface
{
    /**
     * optional, only on buy with invoice
     * An additional invoice payment delay to the usual 20 or 30 days, default is 0
     */
    const POB_DELAY = 'n[..2]';

    /**
     * @param string $pobDelay
     * @return $this
     */
    public function setPobDelay($pobDelay);

    /**
     * @return string
     */
    public function getPobDelay();
}
