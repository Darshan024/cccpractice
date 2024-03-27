<?php
class Import_Model_Resource_Import extends Core_Model_Resource_Abstract
{
    protected $_tableName = "";
    protected $_primaryKey = "";

    public function __construct()
    {
        $this->init('import_data', 'import_id');
    }
}
?>