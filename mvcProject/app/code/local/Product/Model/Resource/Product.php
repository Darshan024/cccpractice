<?php
class Product_Model_Resource_Product
{
    protected $_tableName = "";
    protected $_primaryKey = "";
    public function init($tablename, $primaryKey)
    {
        $this->_tableName = $tablename;
        $this->_primaryKey = $primaryKey;
    }
    //above part is abstract
    public function __construct()
    {
        $this->init('ccc_product', 'product_id');
    }
}
?>