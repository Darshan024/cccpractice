<?php

function insert($table_name, $data)
{
    $columns = $values = [];
    foreach ($data as $col => $val) {
        $columns[] = "'$col'";
        $values[] = "'" . addslashes($val) . "'";
    }

    $columns = implode(",", $columns);
    $values = implode(",", $values);
    echo "<pre>";
    print_r($columns);
    print_r($values);
    echo "<br>";
    return "INSERT INTO {$table_name} ({$columns}) VALUES ({$values});";
}

function update($table_name, $data, $where)
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
    echo "UPDATE {$table_name} SET ({$columns}) WHERE ({$whereCond});";
}

function delete($table_name, $whereCond = [])
{
    $data = [];
    foreach ($whereCond as $field => $val) {
        $data[] = "'$field'='$val'";
    }
    $data = implode(" AND ", $data);
    echo "DELETE FROM {$table_name} WHERE ({$data})";
}
$whereCond = [
    ['cat_id' => 1],
    ['cat_id' => 2],
    ['cat_id' => 3]
];
$data = array("category" => "Bedroom", "pname" => "sofa");
$data1 = ["name" => "sofa"];
update("ccc_category", $data1, $whereCond);
