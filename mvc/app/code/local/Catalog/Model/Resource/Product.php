<?php
class Catalog_Model_Resource_Product
{
    protected $_tableName = "";
    protected $_primaryKey = "";
    public function init($tablename, $primaryKey)
    {
        $this->_tableName = $tablename;
        $this->_primaryKey = $primaryKey;
    }
    public function getTableName()
    {
        return $this->_tableName;
    }
    public function load($id, $column = null)
    {
        $sql = "SELECT * FROM {$this->_tableName} WHERE 
        {$this->_primaryKey}={$id}";
        return $this->getAdapter()->fetchRow($sql);
    }
    //above part is abstract
    public function __construct()
    {
        $this->init('catalog_product', 'product_id');
    }
    public function getAdapter()
    {
        return new Core_Model_DB_Adapter();
    }
    public function getPrimaryKey()
    {
        return $this->_primaryKey;
    }
    public function save(Catalog_Model_Product $product)
    {
        $data = $product->getData();
        if (isset($data[$this->_primaryKey])) {
            unset($data[$this->_primaryKey]);
        }
        $query = $this->insertSql($this->getTableName(), $data);
        $id = $this->getAdapter()->insert($query);
        $product->setId($id);
        // var_dump($id);
        // print_r($data);
    }
    public function insertSql($table_name, $data)
    {
        $columns = $values = [];
        foreach ($data as $col => $val) {
            $columns[] = "`$col`";
            $values[] = "'" . addslashes($val) . "'";
        }
        $columns = implode(",", $columns);
        $values = implode(",", $values);
        return "INSERT INTO {$table_name} ({$columns}) VALUES ({$values});";
    }

}
?>