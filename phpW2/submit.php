<?php
include 'phpfunctions.php';
include 'sqlfunctions.php';
echo "<pre>";
$data=$_POST['group1'];
print_r($_POST['group1']);
$conn=mysqli_connect("localhost","root","","ccc_practice");
if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$pname=$data['pname'];
$sku=$data['sku'];
$ptype= $data['ptype'];
$category=$data['category'];
$mcost=$data['mcost'];
$tcost=$data['tcost'];
$scost=$data['scost'];
$price=$data['price'];
$status=$data['status'];
$cdate=$data['cdate'];
$udate=$data['udate'];
$sql="INSERT INTO ccc_product (pname,sku,product_type,category,manufacture_cost,shipping_cost,total_cost,price,stetus,created_at,updated_at) VALUES ('$pname','$sku','$ptype','$category','$mcost','$scost','$tcost','$price','$status','$cdate','$udate')";
if (mysqli_query($conn,$sql)) {
    echo"Inserted Succefully";
}
?>