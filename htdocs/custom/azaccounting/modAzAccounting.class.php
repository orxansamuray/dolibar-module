<?php
require_once DOL_DOCUMENT_ROOT . '/core/modules/DolibarrModules.class.php';

class modAzAccounting extends DolibarrModules
{
    public function __construct($db)
    {
        global $langs;
        $this->db = $db;
        $this->numero = 500000;
        $this->rights_class = 'azaccounting';
        $this->family = 'az';
        $this->name = preg_replace('/^mod/', '', get_class($this));
        $this->description = "Azərbaycan uçotu modulu";
        $this->version = '1.0';
        $this->const_name = 'MAIN_MODULE_' . strtoupper($this->name);
        $this->picto = 'generic';
        $this->module_parts = array();
        $this->dirs = array('/azaccounting/temp');
        $this->config_page_url = array('setup.php@azaccounting');

        $this->rights = array();
        $r = 0;
        $this->rights[$r][0] = 5001;
        $this->rights[$r][1] = 'Oxu';
        $this->rights[$r][2] = 'r';
        $this->rights[$r][3] = 0;
        $this->rights[$r][4] = 'read';
        $r++;
        $this->rights[$r][0] = 5002;
        $this->rights[$r][1] = 'Yaz';
        $this->rights[$r][2] = 'w';
        $this->rights[$r][3] = 0;
        $this->rights[$r][4] = 'write';
    }
}
