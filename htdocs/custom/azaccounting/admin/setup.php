<?php
require '../../main.inc.php';
require_once DOL_DOCUMENT_ROOT.'/custom/azaccounting/class/accounting.class.php';

$langs->load('azaccounting@azaccounting');
$action = GETPOST('save', 'alpha');

$accounting = new Accounting($db);
$cfg = $accounting->getTaxConfig();

if ($action === 'save') {
    $income = price2num(GETPOST('income_tax_rate', 'alpha'));
    $dsmf = price2num(GETPOST('dsmf_rate', 'alpha'));
    $db->begin();
    $db->query("DELETE FROM llx_az_taxconfig");
    $sql = "INSERT INTO llx_az_taxconfig(income_tax_rate,dsmf_rate) VALUES (".$income.",".$dsmf.")";
    $db->query($sql);
    $db->commit();
    header('Location: setup.php');
    exit;
}

llxHeader('', $langs->trans('AzAccountingSetup'));

print '<form method="post" action="'.$_SERVER['PHP_SELF'].'">';
print '<table class="noborder">';
print '<tr class="liste_titre"><th colspan="2">'.$langs->trans('Vergi Nizamlamalari').'</th></tr>';
print '<tr><td>Gəlir vergisi (%)</td><td><input type="text" name="income_tax_rate" value="'.dol_escape_htmltag($cfg->income_tax_rate).'"></td></tr>';
print '<tr><td>DSMF (%)</td><td><input type="text" name="dsmf_rate" value="'.dol_escape_htmltag($cfg->dsmf_rate).'"></td></tr>';
print '</table>';
print '<div class="center"><input type="submit" class="button" name="save" value="'.$langs->trans('Yadda saxla').'"></div>';
print '</form>';

llxFooter();
