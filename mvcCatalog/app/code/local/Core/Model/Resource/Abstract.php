<?php
class Core_Model_Resource_Abstract
{

    protected $_tableName = "";
    protected $_primaryKey = "";
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

    public function getAdapter()
    {
        return new Core_Model_DB_Adapter();
    }
    public function getPrimaryKey()
    {
        return $this->_primaryKey;
    }
    public function save(Core_Model_Abstract $product)
    {
        $data = $product->getData();
        if (isset($data[$this->_primaryKey])) {
            unset($data[$this->_primaryKey]);
        }
        $query = $this->insertSql($this->getTableName(), $data);
        $id = $this->getAdapter()->insert($query);
        $product->setId($id);
    }
    public function update(Core_Model_Abstract $product, $id)
    {
        $data = $product->getData();
        $query = $this->updateSql($this->getTableName(), $data, ['product_id' => $id]);
        $this->getAdapter()->update($query);
    }
    public function delete(Core_Model_Abstract $abstract)
    {
        $query = $this->deleteSql($this->getTableName(), 
        ['product_id' =>$abstract->getId()]
        );
        $this->getAdapter()->delete($query);
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
    public function updateSql($table_name, $data, $where)
    {
        $columns = $whereCond = [];
        foreach ($data as $field => $value) {
            $columns[] = "`$field`='$value'";
        }
        foreach ($where as $field => $value) {
            $whereCond[] = "`$field`='$value'";
        }
        $columns = implode(",", $columns);
        $whereCond = implode(" AND ", $whereCond);
        return "UPDATE {$table_name} SET {$columns} WHERE {$whereCond};";
    }
    public function deleteSql($table_name, $whereCond)
    {
        $data = [];
        foreach ($whereCond as $field => $val) {
            $data[] = "`$field`='$val'";
        }
        $data = implode(" AND ", $data);
        return "DELETE FROM {$table_name} WHERE ({$data})";
    }
}
?>