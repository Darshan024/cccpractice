<?php
class Lib_sql_Query_Builder extends Lib_connection{
    function __construct()
    {
        
    }
    public function insert($table_name,$data){
        $columns=$values=[];
        foreach($data as $a=>$b){
            $columns[]=sprintf("`%s`",$a);
            $values[]=sprintf("'%s'",addslashes($b));
        }
        $columns=implode(",",$columns);
        $values=implode(",",$values);
        return "INSERT INTO {$table_name} ({$columns}) VALUES ({$values})";
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

    public function select($table_name, $columns=['*'])
    {
        $columns = implode(",", $columns);
        return "SELECT {$columns} FROM {$table_name}";
    }
}

?>