<?php
$integerVar = 42;
var_dump($integerVar);
echo"<br>";
$floatVar=3.14;
var_dump($floatVar);
echo"<br>";

$stringVar = "Hello, PHP!";
var_dump($stringVar);
echo"<br>";

$boolVar = false;
var_dump($boolVar);
echo"<br>";

$arrayVar = array(1, 2, 3, "PHP");
var_dump($arrayVar);
echo"<br>";

$nullVar = null;
var_dump($nullVar);
echo"<br>";

$string=(string) $integerVar;
var_dump($string);
echo"<br>";

$string1=(string) $floatVar;
var_dump($string1);
echo"<br>";

$int1=(int) $stringVar;
var_dump($int1);
echo"<br>";

$int2=(int) $boolVar;
var_dump($int2);
echo"<br>";

$float1=(float)$integerVar;
var_dump($float1);
echo "<br><br>".$float1;

$float2=(float)$arrayVar;
var_dump($float2);
echo"<br>";

$bool1=(bool)"";
var_dump($bool1);
$bool2=(bool)NULL;
var_dump($bool2);
echo"<br>";

$arr1=(array)true;
$arr2=(array)"hello";
var_dump($arr1,$arr2);
echo"<br>";

// $un2=(unset)NULL;
// $un3=(unset)"Hello";
// var_dump($un1,$un2,$un3);

?>