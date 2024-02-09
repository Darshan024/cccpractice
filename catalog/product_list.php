<?php
include 'sql/functions.php';
include 'sql/connection.php';

$col=['product_id','pname','sku','category'];
$sql=select("ccc_product",$col)."ORDER BY product_id DESC LIMIT 20;";
$result=mysqli_query($con,$sql);

echo "<table border='1'>";
echo "<tr><td>Product Id</td><td>Product Name</td><td>SKU</td><td>Category</td></tr>";
while($row=mysqli_fetch_assoc($result)){
    echo "<tr><td>".$row['product_id']."</td>";
    echo "<td>".$row['pname']."</td>";
    echo "<td>".$row['sku']."</td>";
    echo "<td>".$row['category']."</td>";
    echo "<td> <a href='product.php?action=delete&id={$row['pname']}'>Delete</a></td>";
    echo "<td> <a href='product.php?action=edit&id={$row['pname']}'>Update</a></td>";
}
echo "</table>";
?>