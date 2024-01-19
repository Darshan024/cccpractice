<?php
echo "****For Loop****<br>";
for($i=1;$i<=10;$i++){
    for($j=1;$j<$i;$j++){
        echo"*";
    }
    echo"<br>";
}
echo "<br>While Loop<br>";
$i=10;
while($i>0){
    echo $i." ";
    $i--;
}
echo "<br>Foreach Loop <br>";
$students=array("Sam"=>1,"Rohit"=>45,"Rahul"=>4);
foreach($students as $x=>$y){
    echo $x." ".$y."<br>";
}
?>