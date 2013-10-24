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
     * optional, only on buy with invoice
     * account holder of the claim (usually "BillPay GmbH ").
     */
    const POB_ACCOUNTHOLDER = 'ans[..50]';

    /**
     * optional, only on buy with invoice
     * BillPay account number for the claim.
     */
    const POB_ACCOUNTNUMBER = 'n[..10]';

    /**
     * optional, only on buy with invoice
     * BillPay bank code for the claim.
     */
    const POB_BANKCODE = 'n[8]';

    /**
     * optional, only on buy with invoice
     * BillPay Bank Institute for the claim.
     */
    const POB_BANKNAME = 'ans[..50]';

    /**
     * optional, only on buy with invoice
     * purpose
     */
    const POB_PAYERNOTE = 'ans[..80]';

    /**
     * @param string $pobDuedate
     * @return $this
     */
    public function setPobDuedate($pobDuedate);

    /**
     * @return string
     */
    public function getPobDuedate();

    /**
     * @param string $pobAccountholder
     * @return $this
     */
    public function setPobAccountholder($pobAccountholder);

    /**
     * @return string
     */
    public function getPobAccountholder();

    /**
     * @param string $pobAccountnumber
     * @return $this
     */
    public function setPobAccountnumber($pobAccountnumber);

    /**
     * @return string
     */
    public function getPobAccountnumber();

    /**
     * @param string $pobBankcode
     * @return $this
     */
    public function setPobBankcode($pobBankcode);

    /**
     * @return string
     */
    public function getPobBankcode();

    /**
     * @param string $pobPayernote
     * @return $this
     */
    public function setPobPayernote($pobPayernote);

    /**
     * @return string
     */
    public function getPobPayernote();

    /**
     * @param string $pobBankname
     * @return $this
     */
    public function setPobBankname($pobBankname);

    /**
     * @return string
     */
    public function getPobBankname();
}
