<?php
include 'sql/connection.php';
include 'sql/functions.php';

$sql=select('ccc_category',['cat_id','name']);
$result=mysqli_query($con,$sql);
echo "<table border=1>";
echo "<tr><td>Category_id</td><td>Category_Name</td></tr>";
while($row=mysqli_fetch_assoc($result)){
    echo "<tr><td>".$row['cat_id']."</td>";
    echo "<td>".$row['name']."</td></tr>";
}
echo "<table>";
?>