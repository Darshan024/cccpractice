<?php
// $s1="Returns the length of the string";
// echo strlen($s1)."<br>";
// echo strlen(substr($s1,0,3))."<br>";
echo "<pre>";
// $s2="Replaces all occurrences of a substring with another substring in a given string.";
// echo str_replace("string","STRING",$s2);
// echo str_replace("all",me(),$s2);
// function me(){
//     return "more then 2000 ";
// }
// $s3="Finds the position of the first occurrence of a substring in a string.";
// echo "hello  ".strpos($s3,"Finds the position of the first occurrence of a substring in a string.");
// var_dump(strpos($s3,"."));

// $s4="Returns a part of a string starting from the specified position and with a specified lengthh";
// echo substr($s4,5,18);

// $s5="CONVERT STRING TO LOWER CASE";
// echo strtolower($s5);

// $s6="convert string to upper case";
// echo strtoupper($s6);

// $s7="                Removes whitespace or other predefined characters from the beginning and end of a string.                 "."hrloo";
// echo $s7;
// var_dump(($s7));

// $s8=array("Joins","array","elements","with","a","string");
// echo implode("+",$s8);

// $s9="Splits a string into an array by a specified delimiter.";
// $text="The quick brown fox jumps over the lazy dog";
// print_r(explode(" ",$text));
// print_r(implode(" ",array_slice(explode(" ",$text),0,5)));
// $e=explode(" ","$s9");
// echo $e[2]."<br>";
// $e1=explode("p",$s9);
// echo $e1[1]."<br>";
// print_r ($e);

// $s10="Converts<br> special characters to HTML entities";
// echo htmlspecialchars($s10);
// var_dump(htmlspecialchars($s10));

//  $s11='<script>alert("heloo");</script>';
// echo htmlentities($s11)."<br>";

// $s12="Repeats a string a specified number of times.<br>";
// echo str_repeat($s12,11);
// var_dump(str_repeat(str_shuffle(str_replace("all",100,$s12)),10));

$s13="     Reverses a string    ";
echo strrev($s13)."<br>";;
var_dump(strrev($s13));
echo "<br>";
// $s14="Randomly shuffles all characters in a string.";
// echo str_shuffle(str_replace("all",100,$s14));

// $s15="Converts a string to an array";
// print_r(str_split($s15,5));

// $s16="Returns the number of words in a string.";
// echo str_word_count($s16);

// $s16="Replaces a portion of a string with another string";
// echo substr_replace($s16,"PORTION",2,0)."<br>";
// echo substr_replace($s16,"PORTION",-1,7);

// $s17="Pads a string to a certain length with another string";
// $pad_string="_second string";
// echo str_pad($s17,200,$pad_string,STR_PAD_RIGHT);

// $s18="oooooooooooooooooooooooo";
// $s19="returns the number of words in a string.";
// echo strcoll($s18,$s19)."strcoll<br>";;
// here s18 is larger than the s19 so return 1
// var_dump(strcoll($s18,$s19));
// return the 0 if the two string are equal
// return 1 if the string 2 is less than string 1 return -1 if the string 1 is less than string 2

// $s20 = "Finds the length of the initial segment not matching a mask";
// $slen = strlen($s20);
// $pos = strpos($s20, 'i');
// echo $pos . "<br>";
// echo $slen . "<br>";;
// echo strcspn($s20, "of", 14, 32) . "  jhh<br>";
// strcspn is used for the find the words are ocuurred before the given string(it counts the spaces also)
// it takes for arguments first string,second is letter you want to search,third is where to begin the serach in the string 
// and fourth is till which length of the serach should go in string(string length).

// $s21="Case-insensitive length search for the first occurrence of a string";
echo stristr($s21,"length",false)."<br>";
// echo stristr($s21,"length",true)."<br>";
// var_dump(stristr($s21,"a"));
//it is used for the return the string where given needle string is occurred.(third argument = false by defualt)if third argument is given 'true' 
//than return string from string to till the needle string(needle string not included)

// $s22="onverts the first character of a string to uppercase.";
// echo ucfirst($s22);

// $s23="Converts the first character of a string to lowercase.";
// echo lcfirst($s23);

// $s24="Converts the first character of a string to uppercase.";
// echo ucwords($s24);

$text = '\"\1+2/3*2:2-3/4*3';
function map($a)
{
    if (is_numeric($a)) {
        return $a;
    } else {
        return " ";
    }
}
$t2 = str_split('\\/:*?"<>|+-');
echo "<br>";
$t1 = str_replace($t2, ' ', $text);
print_r($t2);
echo "<br>";
foreach((range('A','Z')) as $alphabets){
    $a[]= $alphabets;
}
echo implode(",",$a);

