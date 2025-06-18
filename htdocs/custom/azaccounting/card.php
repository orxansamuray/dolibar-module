<?php
require '../main.inc.php';
require_once DOL_DOCUMENT_ROOT.'/custom/azaccounting/class/payroll.class.php';

$langs->load('azaccounting@azaccounting');
$action = GETPOST('calc', 'alpha');

$payroll = new Payroll($db);
$res = $db->query("SELECT rowid, firstname, lastname FROM llx_az_employee WHERE active=1");

if ($action) {
    $employee = GETPOST('employee', 'int');
    $gross = price2num(GETPOST('gross', 'alpha'));
    $date = GETPOST('pay_date', 'alpha');
    $payroll->addPayroll($employee, $gross, $date);
    header('Location: list.php');
    exit;
}

llxHeader('', $langs->trans('Payroll'));

print '<form method="post" action="'.$_SERVER['PHP_SELF'].'">';
print '<input type="hidden" name="calc" value="1">';
print '<table class="border">';
print '<tr><td>Əməkdaş</td><td><select name="employee">';
while ($res && ($obj = $db->fetch_object($res))) {
    print '<option value="'.$obj->rowid.'">'.$obj->firstname.' '.$obj->lastname.'</option>';
}
print '</select></td></tr>';
print '<tr><td>Məbləğ</td><td><input type="text" name="gross"></td></tr>';
print '<tr><td>Tarix</td><td><input type="date" name="pay_date" value="'.dol_print_date(dol_now(),'day').'"></td></tr>';
print '</table>';
print '<div class="center"><input type="submit" class="button" value="'.$langs->trans('Hesabla').'"></div>';
print '</form>';

llxFooter();
