<?php

if (!defined('DOL_DOCUMENT_ROOT')) {
    define('DOL_DOCUMENT_ROOT', dirname(__FILE__, 4));
}

require_once DOL_DOCUMENT_ROOT . '/core/modules/DolibarrModules.class.php';

class modAzAccounting extends DolibarrModules
{
    public function __construct($db)
    {
        error_log("AZACC_TRACE: Yeni versiya işə düşdü - " . date('Y-m-d H:i:s'));

        parent::__construct($db);

        $this->numero = 580070;
        $this->rights_class = 'azaccounting';
        $this->family = 'financial';
        $this->name = 'azaccounting';
        $this->description = 'Azərbaycan Mühasibat Modulu';
        $this->description_short = 'Test modul';
        $this->version = '1.0';
        $this->const_name = 'MAIN_MODULE_AZACCOUNTING';
        $this->picto = 'generic';
        $this->module_parts = array();

        // Hüquq
        $this->rights = array();
        $r = 0;
        $this->rights[$r][0] = 58001;
        $this->rights[$r][1] = 'Use module';
        $this->rights[$r][2] = 'r';
        $this->rights[$r][3] = 1;
        $this->rights[$r][4] = 'use';

        // Sabit
        $this->const = array();
        $this->const[0] = array(
            'AZACC_SAMPLE_CONST', // name
            'chaine',             // type
            'enabled',            // value
            'Sample const for test', // description
            0,                    // visible
            '',                   // select values
            1                     // delete with module
        );
    }

    public function init($options = '')
{
    error_log("AZACC_TRACE: init() metodu DEAKTIV edildi.");
    return 1; // Müvəqqəti olaraq DB yazma əməliyyatından imtina
}
  
  

    public function remove($options = '')
    {
        error_log("AZACC_TRACE: remove() metodu cagirildi.");
        $sqlres = $this->_remove($options);
        error_log("AZACC_TRACE: parent::_remove() metodu " . ($sqlres ? 'UGURLA (OK)' : 'UGURSUZ (FAIL)') . " neticesini qaytardi.");
        return $sqlres;
    }
}
