<?php
$conn=mysqli_connect("localhost","root","","ccc_practice");
if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$pname=$_POST['pname'];
$sku=$_POST['sku'];
$ptype= $_POST['ptype'];
$category=$_POST['category'];
$mcost=$_POST['mcost'];
$tcost=$_POST['tcost'];
$scost=$_POST['scost'];
$price=$_POST['price'];
$status=$_POST['status'];
$cdate=$_POST['cdate'];
$udate=$_POST['udate'];

$sql="INSERT INTO ccc_product  VALUES('$pname','$sku','$ptype','$category','$mcost','$scost','$tcost','$price','$status','$cdate','$udate')";
if (mysqli_query($conn,$sql)) {
    echo"Inserted Succefully";
    
}

// echo $pname."<br>";
// echo $sku."<br>";
// echo $ptype."<br>";
// echo $category."<br>";
// echo $mcost."<br>";
// echo $scost."<br>";
// echo $tcost."<br>";
// echo $price."<br>";
// echo $status."<br>";
// echo $cdate."<br>";
// echo $udate."<br>";
?>