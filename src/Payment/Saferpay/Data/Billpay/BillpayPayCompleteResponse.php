<?php

namespace Payment\Saferpay\Data\Billpay;

use Payment\Saferpay\Data\Collection\AbstractCollectionItem;

class BillpayPayCompleteResponse extends AbstractCollectionItem implements BillpayPayCompleteResponseInterface
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

    /**
     * @return array
     */
    public function getFieldNames()
    {
        return array(
            'POB_DUEDATE',
        );
    }

    public function getName()
    {
        return 'paycompleteresponse_billpay';
    }
}
