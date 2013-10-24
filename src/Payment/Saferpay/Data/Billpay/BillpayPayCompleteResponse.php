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
     * @param string $pobAccountholder
     * @return $this
     */
    public function setPobAccountholder($pobAccountholder)
    {
        $this->set('POB_ACCOUNTHOLDER', $pobAccountholder);

        return $this;
    }

    /**
     * @return string
     */
    public function getPobAccountholder()
    {
        return $this->get('POB_ACCOUNTHOLDER');
    }

    /**
     * @param string $pobAccountnumber
     * @return $this
     */
    public function setPobAccountnumber($pobAccountnumber)
    {
        $this->set('POB_ACCOUNTNUMBER', $pobAccountnumber);

        return $this;
    }

    /**
     * @return string
     */
    public function getPobAccountnumber()
    {
        return $this->get('POB_ACCOUNTNUMBER');
    }

    /**
     * @param string $pobBankcode
     * @return $this
     */
    public function setPobBankcode($pobBankcode)
    {
        $this->set('POB_BANKCODE', $pobBankcode);

        return $this;
    }

    /**
     * @return string
     */
    public function getPobBankcode()
    {
        return $this->get('POB_BANKCODE');
    }

    /**
     * @param string $pobBankname
     * @return $this
     */
    public function setPobBankname($pobBankname)
    {
        $this->set('POB_BANKNAME', $pobBankname);

        return $this;
    }

    /**
     * @return string
     */
    public function getPobBankname()
    {
        return $this->get('POB_BANKNAME');
    }

    /**
     * @param string $pobPayernote
     * @return $this
     */
    public function setPobPayernote($pobPayernote)
    {
        $this->set('POB_PAYERNOTE', $pobPayernote);

        return $this;
    }

    /**
     * @return string
     */
    public function getPobPayernote()
    {
        return $this->get('POB_PAYERNOTE');
    }

    /**
     * @return array
     */
    public function getFieldNames()
    {
        return array(
            'POB_DUEDATE',
            'POB_ACCOUNTHOLDER',
            'POB_ACCOUNTNUMBER',
            'POB_BANKCODE',
            'POB_BANKNAME',
            'POB_PAYERNOTE',
        );
    }

    public function getName()
    {
        return 'paycompleteresponse_billpay';
    }
}
