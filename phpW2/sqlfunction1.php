<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "ccc_practice";
$con = mysqli_connect($host, $user, $password, $db);
if (!$con) {
    echo "Connection Failed";
}

class SQLQueryExecute
{
    private $obj;
    public function __construct()
    {
        $this->obj = new SQLQueryBuilder();
    }
    public function insert($table_name, $data)
    {
        global $con;
        $sql = $this->obj->insert($table_name, $data);
        if ($result = $con->query($sql)) {
            echo "Inserted Successfully";
        }
    }
    public function update($table_name, $data, $where)
    {
        global $con;
        $sql = $this->obj->update($table_name, $data, $where);
        echo $sql;
        if ($result = $con->query($sql)) {
            echo "Updated Successfully";
        }
    }
    function delete($table_name, $whereCond)
    {
        global $con;
        $sql1 = new SQLQueryBuilder();
        $sql = $this->obj->delete($table_name, $whereCond);
        if ($result = $con->query($sql)) {
            echo "deleted successfully";
        }
    }

    function select($table_name, $columns = ["*"])
    {
        global $con;
        $sql = $this->obj->select($table_name, $columns);
        $result = $con->query($sql);
        print_r($result);
    }
}


class SQLQueryBuilder
{
    public function insert($table_name, $data)
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

    public function update($table_name, $data, $where)
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

    public function delete($table_name, $whereCond)
    {
        $data = [];
        foreach ($whereCond as $field => $val) {
            $data[] = "'$field'='$val'";
        }
        $data = implode(" AND ", $data);
        print_r($data);
        return "DELETE FROM {$table_name} WHERE ({$data})";
    }

    public function select($table_name, $columns)
    {
        $columns = implode(",", $columns);
        return "SELECT {$columns} FROM {$table_name}";
    }
}
$obj = new SQLQueryExecute();
$data = array("category" => "Bedroom", "pname" => "sofa");
$whereCond = ["price" => 80];
$obj->update("ccc_category", $data1, $whereCond);
