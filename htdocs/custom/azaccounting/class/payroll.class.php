<?php
require_once __DIR__ . '/accounting.class.php';

class Payroll
{
    /** @var \DoliDB */
    public $db;
    /** @var Accounting */
    public $accounting;

    public function __construct($db)
    {
        $this->db = $db;
        $this->accounting = new Accounting($db);
    }

    public function addPayroll($employeeId, $gross, $date)
    {
        $taxes = $this->accounting->computeTaxes($gross);
        $sql = "INSERT INTO llx_az_payroll(fk_employee, pay_date, gross, income_tax, dsmf, net)";
        $sql .= " VALUES(" . ((int)$employeeId) . ", '" . $this->db->escape($date) . "'," . ((float)$gross) . ",";
        $sql .= ((float)$taxes['income_tax']) . "," . ((float)$taxes['dsmf']) . "," . ((float)$taxes['net']) . ")";
        return $this->db->query($sql);
    }

    public function getPayrolls()
    {
        $sql = "SELECT p.rowid, p.pay_date, e.lastname, e.firstname, p.gross, p.income_tax, p.dsmf, p.net";
        $sql .= " FROM llx_az_payroll as p";
        $sql .= " LEFT JOIN llx_az_employee as e ON p.fk_employee = e.rowid";
        $sql .= " ORDER BY p.pay_date DESC";
        $res = $this->db->query($sql);
        $list = array();
        while ($res && ($obj = $this->db->fetch_object($res))) {
            $list[] = $obj;
        }
        return $list;
    }
}
