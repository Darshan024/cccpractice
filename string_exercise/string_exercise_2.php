<?php
$text = "Hello, World! How are you doing?";

echo "length of the string ".strlen($text);
echo "<br><br>In Lower case=".strtolower($text);
echo "<br><br>In Upper case=".strtoupper($text);

$s1="How are you doing?";
$s2= "Fine, thank you!";
echo "<br><br>String replaced=".str_replace($s1,$s2,$text);
//replace takes three arguments (existed word or line in string,new string that you want to add,and object )
echo "<br><br>First 10 character from the string = ".substr($text,0,10);
echo "<br><br>String from the 8th character = ".substr($text,8);
?>