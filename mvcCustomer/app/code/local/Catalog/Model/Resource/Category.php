<?php
class Catalog_Model_Resource_Category extends Core_Model_Resource_Abstract
{
    protected $_tableName = "";
    protected $_primaryKey = "";
    public function __construct()
    {
        $this->init('ccc_category', 'category_id');
    }
}
?>