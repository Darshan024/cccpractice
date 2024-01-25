<?php
function insert($table_name,$data){
    $columns=$values=[];
    foreach($data as $col => $val){
        $columns[]="'$col'";
        $values[]="'".addslashes($val)."'";
    }
    
    $columns=implode(",",$columns);
    $values=implode(",",$values);
    echo "<pre>";
    print_r($columns);
    print_r($values);
    echo "<br>";
    return "INSERT INTO {$table_name} ({$columns}) VALUES ({$values});";
}

function update($table_name,$data,$where){
    $columns=$whereCond=[];
    foreach($data as $field => $value){
        $columns[]="$field='$value'";  
    }
    foreach($where as $field => $value){
        $whereCond[]="$field='$value'";
    }
    $columns=implode(",",$columns);
    $whereCond=implode(",",$whereCond);
    return "UPDATE {$table_name} SET {$columns} WHERE {$whereCond};";
}


function delete($table_name,$whereCond){
    $data=[];
    foreach($whereCond as $field => $val){
        $data[]="$field='$val'";
    }
    $data=implode(",",$data);
    print_r($data);
    return "DELETE FROM {$table_name} WHERE {$data}";
}

function select($table_name,$columns){
    $col=$where=[];
    foreach($columns as $field => $value){
        $col[]="$value";  
    }
    $col=implode(",",$col);
    return "SELECT {$col} FROM {$table_name} ";
}

// $col= ['product_name','sku','category'];
// $where=['pname'=>'sofa'];
// select('ccc_product',$col,$where);


?>