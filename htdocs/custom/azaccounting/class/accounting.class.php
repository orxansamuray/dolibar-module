<?php
class Accounting
{
    /** @var \DoliDB */
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getTaxConfig()
    {
        $sql = "SELECT income_tax_rate, dsmf_rate FROM llx_az_taxconfig LIMIT 1";
        $res = $this->db->query($sql);
        if ($res && $this->db->num_rows($res)) {
            return $this->db->fetch_object($res);
        }
        return (object)array('income_tax_rate' => 0, 'dsmf_rate' => 0);
    }

    public function computeTaxes($gross)
    {
        $cfg = $this->getTaxConfig();
        $income_tax = $gross * $cfg->income_tax_rate / 100;
        $dsmf = $gross * $cfg->dsmf_rate / 100;
        $net = $gross - $income_tax - $dsmf;
        return array('income_tax' => $income_tax, 'dsmf' => $dsmf, 'net' => $net);
    }
}
