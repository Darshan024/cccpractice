<?php
class Core_Model_Request
{
    public function __construct()
    {
        $url=$this->getRequestUri();
        $url=explode("/",$url);
        $this->moduleName=$url[0];
        $this->controllerName=$url[1];
        $this->actionName=$url[2];
    }
    protected $controllerName;
    protected $actionName;
    protected $moduleName;
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
        $_uri=str_replace("/Practice/mvcproject/","",$_uri);
        return $_uri;
    }
    public function getModuleName(){
        return $this->moduleName;
    }
    public function getActionName(){
        return $this->actionName;
    }
    public function getControllerName(){
        return $this->controllerName;
    }
    public function getFullControllerClass(){
        // $FullControllerClass="Page_Controller".$this->controllerName;
        $controllerClass = ucfirst($this->moduleName)."_Controller_".($this->controllerName);
        return $controllerClass;
    }
}
