<?php
// $s1="the chop function remove whitespaces      ";
// echo chop($s1,"whitespaces");
// echo "Heloo";

// $s2="chunk_split function used to splits a string into smaller chunks";
// echo chunk_split($s2,"2","/");

// $s3="this function count the occurrence if the sub string given in argument";
// echo substr_count($s3,"the")."<br>".substr_count($s3," ")."<br>".substr_count($s3,"h");
// it also count the whitespaces;

// $s4='<a href="www.google.com">this is output using the strip tag</a>';
// echo strip_tags($s4,"<a>");
// this function is use html tag from string

$s5="hello phpphphphphpphphphphp";
$s6="p";
echo strchr($s5,$s6)." strchr<br>";;

$t1="mvc/index.php";
$t2= basename($t1,".php");
echo $t2."<br>";

$t3='rayy@example.com';
echo ltrim($t3,'rayy@')."<br>";

function generate($x){
$t4="1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$result=substr(str_shuffle($t4),0,8);
echo $result."<br>";
}
generate(8);

$str1="football";
$str2="footboll";
$str=strspn($str1 ^ $str2,"\0");
echo $str;

$str4="Twinkle,twinkle,little\nHow I wonder\nlike a diamnond";
echo "count e=".(substr_count($str4,'e'))."<br>";
$s[]=$str4;
print_r($s);

$ch='z';
$nextxh=++$ch;
if(strlen($nextxh)>1){
    $nextxh=$nextxh[0];
}
echo "<br>".$nextxh."<br>";

$str5="The quick box";
echo substr($str5,0,3)."<br>";

$text= $_SERVER['REQUEST_URI'];
$t=str_replace("/"," ",$text);
$arr=explode(" ",trim($t));
print_r($arr);
echo "<br>".$arr[1]."<br>";
echo $t;

echo "<br>helo";
$text="heloo world!";
if(strpos($text,'world',strlen($text))!=='false'){
    echo "exist";
}
else{
    echo "t";
}
?>