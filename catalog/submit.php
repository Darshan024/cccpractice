<?php
include 'sql/connection.php';
include 'sql/functions.php';
$action=$_REQUEST['submit'];
$data1=$_REQUEST['group1'];
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
if($action=='update'){
    $where=['pname'=>"$pname"];
    $query=update('ccc_product',$data1,$where);
    if($result=mysqli_query($con,$query)){
        echo "updated sucessfully<br>";
        echo "<a href='product_list.php'>Prodcut List</a><br>";
        echo "<a href='product.php'>Insert new product</a>";
        
}
}
elseif($action=='Insert'){
    $sql=insert('ccc_product',$data1);
    if($result=mysqli_query($con,$sql)){
        echo "inserted sucessfully";
        echo "<a href='product_list.php'>Prodcut List</a><br>";
        echo "<a href='product.php'>Insert new Product</a>";
}
}
?>