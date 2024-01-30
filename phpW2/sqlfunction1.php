<?php
$host="localhost";
$user="root";
$password="";
$db="ccc_practice";
$con=mysqli_connect($host,$user,$password,$db);
if(!$con){
    echo "Connection Failed";
}
function insert($table_name,$data){
    global $con;
    $columns=$values=[];
    foreach($data as $col => $val){
        $columns[]="`$col`";
        $values[]="'".addslashes($val)."'";
    }
    
    $columns=implode(",",$columns);
    $values=implode(",",$values);
    // echo "<pre>";
    // print_r($columns);
    // print_r($values);
    // echo "<br>";
    $sql= "INSERT INTO {$table_name} ({$columns}) VALUES ({$values});";
    if($result=$con->query($sql)){
        echo "inserted succesfullt";
    }
}
$data=array("category"=>"Bedroom","sku"=>56);
// insert("ccc_product",$data);

function update($table_name,$data,$where){
    global $con;
    $columns=$whereCond=[];
    foreach($data as $field => $value){
        $columns[]="`$field`='$value'";  
    }
    foreach($where as $field => $value){
        $whereCond[]="`$field`='$value'";
    }
    $columns=implode(",",$columns);
    $whereCond=implode("AND",$whereCond);
    // echo "<pre>";
    // print_r(($whereCond));
    $sql= "UPDATE {$table_name} SET {$columns} WHERE {$whereCond};";
    // echo $sql;
    if($result=$con->query($sql)){
        echo "Updated sucessfully";
    }
}
$whereCond=["pname"=>"sofa"];
// update("ccc_product",$data,$whereCond);

function delete($table_name,$whereCond){
    global $con;
    $data=[];
    foreach($whereCond as $field => $val){
        $data[]="`$field`='$val'";
    }
    $data=implode(",",$data);
    print_r($data);
    $sql= "DELETE FROM {$table_name} WHERE {$data}";
    if($result=$con->query($sql)){
        echo "deleted succesfully";
    }
}

function select($table_name,$columns=["*"]){
    global $con;
    // $col=$where=[];
    $col=implode(",",$columns);
    $sql= "SELECT {$col} FROM {$table_name} ";
    $result=$con->query($sql);
    return $result;
}

select('ccc_product',['pname']);
select('ccc_product');

?>