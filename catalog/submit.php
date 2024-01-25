<?php
include 'sql/connection.php';
include 'sql/functions.php';
$data1=$_REQUEST['group1'];
// print_r($data1);
// print_r($_POST['group1']);
$pname=$data1['pname'];
// $sku=$data['sku'];
// $product_type= $data['product_type'];
// $category=$data['category'];
// $manufacture_cost=$data['manufacture_cost'];
// $total_cost=$data['tcotal_cost'];
// $shipping_cost=$data['shipping_cost'];
// $price=$data['price'];
// $status=$data['stetus'];
// $created_date=$data['created_at'];
// $updated_date=$data['upadated_at'];
$where=['pname'=>"$pname"];
$sql=update('ccc_product',$data1,$where);
echo $sql;
if($result=mysqli_query($con,$sql)){
    echo "updated sucessfully";
}

?>