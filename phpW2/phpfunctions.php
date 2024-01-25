<?php
function getParam($key){
    if(isset($_POST[$key])){
        return $_POST[$key];
    }
    elseif(isset($_GET[$key])){
        return $_GET[$key];
    }
    elseif(isset($_REQUEST[$key])){
        return $_REQUEST[$key];
    }
}
?>