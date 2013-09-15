<?php

namespace Payment\Saferpay\Data\Billpay;

use Payment\Saferpay\Data\AbstractGetSet;
use Payment\Saferpay\Data\SubBaseInterface;

class BillpayPayCompleteResponse extends AbstractGetSet implements BillpayPayCompleteResponseInterface, SubBaseInterface
{
    /**
     * @param string $pobDuedate
     * @return $this
     */
    public function setPobDuedate($pobDuedate)
    {
        $this->set('POB_DUEDATE', $pobDuedate);

        return $this;
    }

    /**
     * @return string
     */
    public function getPobDuedate()
    {
        return $this->get('POB_DUEDATE');
    }
}