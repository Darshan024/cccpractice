<?php
include 'sql/connection.php';
include 'sql/functions.php';
$data=$_POST['group'];
$sql=insert('ccc_category',$data);
if($result=mysqli_query($con,$sql)){
    echo "inserted";
}

?>