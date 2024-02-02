<?php
class Model_Request
{
    public function __construct()
    {
    }
    public function getparams($key = '')
    {
        return ($key == '')
			? $_REQUEST
			: (isset($_REQUEST[$key])
				? $_REQUEST[$key]
				: ''
			);
    }
    public function getpostdata($key=''){
        return ($key == '')
			? $_POST
			: (isset($_POST[$key])
				? $_POST[$key]
				: ''
			);
    }
    public function getquerydata($key=''){
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
}
