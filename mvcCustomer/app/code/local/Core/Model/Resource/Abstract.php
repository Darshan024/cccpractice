<?php
class Core_Model_Resource_Abstract
{
    protected $_tableName = "";
    protected $_primaryKey = "";
    public function getTableName()
    {
        return $this->_tableName;
    }
    public function init($tablename, $primaryKey)
    {
        $this->_tableName = $tablename;
        $this->_primaryKey = $primaryKey;
    }
    public function load($id, $column = null)
    {
        $sql = "SELECT * FROM {$this->_tableName} WHERE 
        {$this->_primaryKey}={$id}";
        return $this->getAdapter()->fetchRow($sql);
    }
    public function checkPassword(Core_Model_Abstract $abstract)
    {
        $data = $abstract->getData();
        $key = array_keys($data);
        // print_r($data);
        $password = $data["password"];
        $email = $data["customer_email"];
        $sql = $this->selectSql($this->getTableName(), ["{$key[1]}"]) . " WHERE `customer_email`='$email'";
        $sqlForId = $this->selectSql($this->getTableName(), ['`customer_id`']) . " WHERE `customer_email`='$email'";
        $result = $this->getAdapter()->fetchRow($sql);
        if ($password == $result['password']) {
            $id = $this->getAdapter()->fetchRow($sqlForId);
            $abstract->setId($id);
        } else {
            echo "password is incorrect";
        }
    }

    public function getAdapter()
    {
        return new Core_Model_DB_Adapter();
    }
    public function getPrimaryKey()
    {
        return $this->_primaryKey;
    }
    public function save(Core_Model_Abstract $abstract)
    {
        $data = $abstract->getData();
        if (isset($data[$this->getPrimaryKey()]) && !empty($data[$this->getPrimaryKey()])) {
            $sql = $this->updateSql($this->getTableName(), $data, [$this->getPrimaryKey() => $abstract->getId()]);
            $this->getAdapter()->update($sql);
        } else {
            $sql = $this->insertSql($this->getTableName(), $data);
            $id = $this->getAdapter()->insert($sql);
            $abstract->setId($id);
        }
    }
    public function delete(Core_Model_Abstract $abstract)
    {
        $query = $this->deleteSql($this->getTableName(), [$this->getPrimaryKey() => $abstract->getId()]);
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
    public function selectSql($table_name, $columns)
    {
        $columns = implode(",", $columns);
        return "SELECT {$columns} FROM {$table_name}";
    }
}
?>