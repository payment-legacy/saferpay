<?php

namespace Payment\Saferpay\Data\Billpay;

interface BillpayPayCompleteResponseInterface
{
    /**
     * optional, only on buy with invoice
     * Defines the date until the customer has to pay the bill
     * Format: YYYYMMDD
     */
    const POB_DUEDATE = 'n[8]';

    /**
     * @param string $pobDuedate
     * @return $this
     */
    public function setPobDuedate($pobDuedate);

    /**
     * @return string
     */
    public function getPobDuedate();
}