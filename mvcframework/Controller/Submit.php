<?php
$text=$_SERVER['REQUEST_URI'];
$text=ltrim($text,'/');
$text=explode("/",$text);
print_r($text[0]);
?>