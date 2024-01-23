<?php

echo"****If Condition****";
    echo"<br>(1)";
    $i1=10;
    $i2=9;
    $condition = $i1<$i2;
    if ($condition) {
        echo "Condition is true.";
    }

echo"****If else condition****";
    echo"<br>(2)";
    $i3="Hello";
    $i4="Php";
    if ($i3==$i4) {
        echo "Condition is true.";
    } else{
        echo "Condition is false.";
    }

echo"<br><br>****If-Elseif-Else Statement:****";
echo("<br>(3)");
$i5=19;
if ($i5> 19) {
    echo "Greter than 19";
} elseif ($i5<20 && $i5>18) {
    echo "Number is bet the 18 and & 19";
} else {
    echo "Number is zero.";
}

echo"<br><br>****Nested If Statements:****<br>";
$i6=24;
if($i6>15){
    if($i6==24){
        echo"Number is 24";
    }
    else{
        echo "Not a 24";
    }
}
else{
    echo "Number is not grATER THAN 15";
}




















    ?>
