<?php
echo "****ArithMetic Operators****";
$ao1=10;
$ao2=7;
echo "<br>(1)".$ao1+$ao2;
echo "<br>(2)".$ao1-$ao2;
echo "<br>(3)".$ao1*$ao2;
echo "<br>(4)".$ao1/$ao2;
echo "<br>(5)".$ao1%$ao2;
echo "<br>(6)".$ao1**$ao2;

echo "<br><br>"."****Assignment Operator****";
$a1=10;
$a2=20;
echo "<br>(7)".$a1." ". ($a1=$a2);

// $a1+=$a2;
echo "<br>(8)".$a1." ".$a1+=$a2;

// $a1-=$a2;
echo "<br>(9)".$a1." ".$a1-=$a2;

echo "<br>(10)".$a1." ".$a1*=$a2;

echo "<br>(11)".$a1." ".$a1/=$a2;

echo "<br>(12)".$a1." ".$a1%=$a2;

echo "<br><br>"."****Comparison Operator****";

$co1="456";
$co2=456;

echo "<br>(13)";
var_dump($co1 == $co2);
if($co1==$co2){echo "<br>Equal";}
else{ echo "<br>Not Euqal"; }

echo "<br>(14)";
var_dump($co1 === $co2);
if($co1===$co2){echo "<br>Equal";}
else{ echo "<br>Not Equal"; }

echo "<br>(15)";
var_dump($co1!=$co2);
echo "<br>";
$co3="Hello";
$co4=20.4;
$co5=45.6;
var_dump($co3<>$co4);

if($co1!==$co2){ echo "<br>(16)Not identical";}
else{echo "<br>(16)Iedntically correct";}

echo "<br>(17)";
var_dump($co2>$co4);

echo "<br>(18)";
var_dump($co5>$co4);

echo "<br>(19)";
$co6=456;
var_dump($co2>=$co6);

echo "<br>(20)";
var_dump($co6>=$co5*10);


echo"<br><br>****Logical Operators:****";
$lo=10;
$lo1="Hello";
echo"<br>(21)";
if($lo==10 && $lo1=="Hello"){ echo "Hello And Op pass";}
else{echo "And Op failed";}
echo"<br>(22)";
if($lo==10 && $lo1=="Hell"){ echo "Or OP pass";}
else{echo "Or op failed";}

echo"<br>(23)";
var_dump(!($lo==11));

echo"<br><br>****Increment and Decrement Operators:";
$io=10;
$io1=$io++;
echo "<br>(24)"."Incemented ".$io." Original " .$io1;
echo "<br>(25)"."Incemented ".++$io." Original " .$io1;

echo"<br><br>****String Operators:****";
$so="Hello";
$so1="PHP";
echo "<br>(26)".$so." ".$so1;
$so.=$so1;
echo "<br>(27)".$so;

echo "<br><br>****Conditional (Ternary) Operator:****";

echo"<br>(33)Ternary:";
echo("Hello">"Hell")?'Hello':'Hell';

?>