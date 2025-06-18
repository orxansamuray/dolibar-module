<?php
require '../main.inc.php';
require_once DOL_DOCUMENT_ROOT.'/custom/azaccounting/class/payroll.class.php';

$langs->load('azaccounting@azaccounting');
$payroll = new Payroll($db);
$records = $payroll->getPayrolls();

llxHeader('', $langs->trans('PayrollList'));

print '<table class="noborder">';
print '<tr class="liste_titre">';
print '<th>Tarix</th><th>Əməkdaş</th><th>Məbləğ</th><th>Gəlir vergisi</th><th>DSMF</th><th>Xalis</th>';
print '</tr>';
foreach ($records as $rec) {
    print '<tr>';
    print '<td>'.dol_print_date($db->jdate($rec->pay_date),'day').'</td>';
    print '<td>'.$rec->firstname.' '.$rec->lastname.'</td>';
    print '<td>'.$rec->gross.'</td>';
    print '<td>'.$rec->income_tax.'</td>';
    print '<td>'.$rec->dsmf.'</td>';
    print '<td>'.$rec->net.'</td>';
    print '</tr>';
}
print '</table>';

llxFooter();
