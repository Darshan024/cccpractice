<?php
class Catalog_Model_Resource_Product extends Core_Model_Resource_Abstract
{
    protected $_tableName = "";
    protected $_primaryKey = "";
    public function init($tablename, $primaryKey)
    {
        $this->_tableName = $tablename;
        $this->_primaryKey = $primaryKey;
    }
    public function __construct()
    {
        $this->init('catalog_product', 'product_id');
    }
}
?>