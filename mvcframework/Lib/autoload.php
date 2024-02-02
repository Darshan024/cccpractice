<?php
spl_autoload_register(function($classname){
    $classname=str_replace("_","/",$classname);
    include_once $classname.".php";
})
?>