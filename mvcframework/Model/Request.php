<?php
class Model_Request
{
    // public function __construct()
    // {
    // }
    public function getParams($key = '')
    {
        return ($key == '')
			? $_REQUEST
			: (isset($_REQUEST[$key])
				? $_REQUEST[$key]
				: ''
			);
    }
    public function getPostdata($key=''){
        return ($key == '')
			? $_POST
			: (isset($_POST[$key])
				? $_POST[$key]
				: ''
			);
    }
    public function getQuerydata($key=''){
        return ($key == '')
			? $_GET
			: (isset($_GET[$key])
				? $_GET[$key]
				: ''
			);
    }
    public function isPost(){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            return true;
        }
        return false;
    }
    public function getRequestUri(){
        $_uri= $_SERVER['REQUEST_URI'];
        $_uri=str_replace("/Practice/mvcframework/","",$_uri);
        return $_uri;
    }
}
