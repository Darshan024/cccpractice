<?php
function fetchFromPost($key){
    if(isset($_POST[$key])){
        return $_POST[$key];
    }
}
function fetFromGet($key){
    if(isset($_GET[$key])){
        return $_GET[$key];
    }
}
function fetchFromRequest($key){
    if(isset($_REQUEST[$key])){
        return $_REQUEST[$key];
    }
}
?>