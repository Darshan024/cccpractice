<?php
$host="localhost";
$user="root";
$password="";
$db="ccc_practice";
$con=mysqli_connect($host,$user,$password,$db);
if(!$con){
    echo "Connection Failed";
}
class SQLQueryExecute{
 public function insert($table_name,$data){
    global $con;
    $insert=new SQLBuilder();
    $sql=$insert->insert($table_name,$data);
    // echo $sql;
    if($result=$con->query($sql)){
        echo true;
    }
}
public function update($table_name,$data,$where){
    global $con;
    $sql1=new SQLBuilder();
    $sql=$sql1->update($table_name,$data,$where);
    // echo $sql;
    if($result=$con->query($sql)){
        echo true;
    }
}
// $whereCond=["pname"=>"sofa"];
// update("ccc_product",$data,$whereCond);

function delete($table_name,$whereCond){
    global $con;
    // $data=[];
    // foreach($whereCond as $field => $val){
    //     $data[]="`$field`='$val'";
    // }
    // $data=implode(",",$data);
    // print_r($data);
    $sql1=new SQLBuilder();
    $sql=$sql1->delete($table_name,$whereCond);
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
}
// select('ccc_product',['pname']);
// select('ccc_product');
class SQLBuilder{
    public function insert($table_name,$data){
        $columns=$values=[];
        foreach($data as $col => $val){
            $columns[]="`$col`";
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
    // $data=array("category"=>"Bedroom","pname"=>"sofa","ptype"=>"sofa");
    // insert("ccc_product",$data);
    
    public function update($table_name,$data,$where){
        $columns=$whereCond=[];
        foreach($data as $field => $value){
            $columns[]="`$field`='$value'";  
        }
        foreach($where as $field => $value){
            $whereCond[]="`$field`='$value'";
        }
        $columns=implode(",",$columns);
        $whereCond=implode("AND",$whereCond);
        return "UPDATE {$table_name} set {$columns} where {$whereCond};";
    }
    // $whereCond=["price"=>1200];
    // update("ccc_product",$data,$whereCond);
    
    public function delete($table_name,$whereCond){
        $data=[];
        foreach($whereCond as $field => $val){
            $data[]="'$field'='$val'";
        }
        $data=implode("AND",$data);
        print_r($data);
        return "DELETE FROM {$table_name} WHERE ({$data})";
    }
    }
$obj=new SQLQueryExecute();
// $obj->insert("ccc_product",array("category"=>"Bedroom","sku"=>56));
$whereCond=["pname"=>"sofa"];
$data=array("category"=>"Bedroom","pname"=>"sofa");
// $obj->update("ccc_product",$data,$whereCond);
// $obj->delete('ccc_product',["shipping-cost"=>'1200',"price"=>1200]);
?>