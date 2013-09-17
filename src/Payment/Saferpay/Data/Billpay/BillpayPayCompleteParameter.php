<?php

namespace Payment\Saferpay\Data\Billpay;

use Payment\Saferpay\Data\Collection\AbstractCollectionItem;

class BillpayPayCompleteParameter extends AbstractCollectionItem implements BillpayPayCompleteParameterInterface
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

    /**
     * @return array
     */
    public function getFieldNames()
    {
        return array(
            'POB_DELAY',
        );
    }

    public function getName()
    {
        return 'paycompleteparameter_billpay';
    }
}
