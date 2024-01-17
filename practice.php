<?php
// $s1="Returns the length of the string";
// echo strlen($s1);

// $s2="Replaces all occurrences of a substring with another substring in a given string.";
// echo str_replace("string","STRING",$s2);

// $s3="Finds the position of the first occurrence of a substring in a string.";
// echo strpos($s3,"the");

// $s4="Returns a part of a string starting from the specified position and with a specified length.";
// echo substr($s4,5,10);

// $s5="CONVERT STRING TO LOWER CASE";
// echo strtolower($s5);

// $s6="convert string to upper case";
// echo strtoupper($s6);

// $s7="                  Removes whitespace or other predefined characters from the beginning and end of a string.                 ";
// echo trim($s7);

// $s8=array("Joins","array","elements","with","a","string");
// echo implode("+",$s8);

// $s9="Splits a string into an array by a specified delimiter.";
// $e=explode(" ","$s9");
// echo $e[2]."<br>";
// $e1=explode("p","$s9");
// echo $e1[1]."<br>";
// print_r ($e1);

// $s10="Converts<br> special characters to HTML entities";
// echo htmlspecialchars($s10);

$s11='Converts<h1> all applicable characters</h1> to HTML entities.';
echo htmlentities($s11);
?>