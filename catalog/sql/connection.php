
<?php
$host="localhost";
$user="root";
$password="";
$db="ccc_practice";
$con=mysqli_connect($host,$user,$password,$db);

if(!$con){
    echo "Connection Failed";
}

?>