<?php
class Core_Model_Request
{
    protected $_controllerName;
    protected $_actionName;
    protected $_moduleName;
    public function __construct()
    {
        $url = $this->getRequestUri();
        $url = array_filter(explode("/", $url));
        $this->_moduleName = isset($url[0]) ? $url[0] : 'page';
        $this->_controllerName = isset($url[1]) ? $url[1] : 'index';
        $this->_actionName = isset($url[2]) ? $url[2] : 'index';

    }
    public function getParams($key = '')
    {
        return ($key == '')
            ? $_REQUEST
            : (isset($_REQUEST[$key])
                ? $_REQUEST[$key]
                : ''
            );
    }
    public function getPostdata($key = '')
    {
        return ($key == '')
            ? $_POST
            : (isset($_POST[$key])
                ? $_POST[$key]
                : ''
            );
    }
    public function getQuerydata($key = '')
    {
        return ($key == '')
            ? $_GET
            : (isset($_GET[$key])
                ? $_GET[$key]
                : ''
            );
    }
    public function isPost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return true;
        }
        return false;
    }
    public function getRequestUri()
    {
        $_uri = $_SERVER['REQUEST_URI'];
        $_uri = str_replace("/Practice/mvcproject/", "", $_uri);
        return $_uri;
    }
    public function getModuleName()
    {
        return $this->_moduleName;
    }
    public function getActionName()
    {
        return $this->_actionName;
    }
    public function getControllerName()
    {
        return $this->_controllerName;
    }
    public function getFullControllerClass()
    {
        // $FullControllerClass="Page_Controller".$this->_controllerName;
        $controllerClass = ucfirst($this->_moduleName) . "_Controller_" . ($this->_controllerName);
        return $controllerClass;
    }
}
