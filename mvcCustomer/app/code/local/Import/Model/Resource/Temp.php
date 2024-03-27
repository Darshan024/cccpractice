<?php
class Import_Model_Resource_Temp extends Core_Model_Resource_Abstract
{
    protected $_tableName = "";
    protected $_primaryKey = "";

    public function __construct()
    {
        $this->init('temp_data', 'temp_id');
    }
}
?>