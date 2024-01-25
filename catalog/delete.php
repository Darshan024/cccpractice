<?php
include 'sql/functions.php';
include 'sql/connection.php';

if($_GET['action']=='delete'){
    $pname=$_GET['id'];
    $sql=delete('ccc_product',['pname'=>"$pname"]);
    if($result=mysqli_query($con,$sql)){
        echo "Deleted Succesfully";
    }

}
?>