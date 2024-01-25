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
    echo "INSERT INTO {$table_name} ({$columns}) VALUES ({$values});";
}
$data=array("category"=>"Bedroom","pname"=>"sofa","ptype"=>"sofa");
insert("ccc_product",$data);

function update($table_name,$data,$where){
    $columns=$whereCond=[];
    foreach($data as $field => $value){
        $columns[]="'$field'='$value'";  
    }
    foreach($where as $field => $value){
        $whereCond[]="'$field'='$value'";
    }
    $columns=implode(",",$columns);
    $whereCond=implode(",",$whereCond);
    echo "update into {$table_name} set ({$columns} where ({$whereCond}));";
}
$whereCond=["price"=>1200];
update("ccc_product",$data,$whereCond);

function delete($table_name,$whereCond){
    $data=[];
    foreach($whereCond as $field => $val){
        $data[]="'$field'='$val'";
    }
    $data=implode(",",$data);
    print_r($data);
    echo "DELETE FROM {$table_name} WHERE ({$data})";
}
$whre1=["shipping-cost"=>'1200',"price"=>1200];
delete("ccc_product",$whre1);

?>