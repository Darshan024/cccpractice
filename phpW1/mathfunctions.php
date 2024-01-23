<?php

echo"****basic arithmetic function****";
echo "<br><br>".abs(-10.10);
echo "<br><br>".abs(1.905200);

//ceil function rounds a number up to the nearest integer
echo "<br><br>".ceil(-0.8);
echo "<br><br>".ceil(-10.5);

//floor function rounds a number down to the nearest integer
echo "<br><br>".floor(5.9);
echo "<br><br>".floor(4.0);

//round a number rounds a floating -point number
echo "<br><br>".round(34.45789,3);
echo "<br><br>".round(5.4569,1);

echo"<br><br>****Power Functions****";
echo "<br><br>".pow(-12,-3);
echo "<br><br>".pow(0,-3);//INF
echo "<br><br>".sqrt(5);

echo"<br><br>****Random Number Geberations";
echo "<br><br>".rand(10,11.2);

echo"<br><br>****Number Formatting";
echo "<br><br>".number_format(100000,1,".",",");

?>