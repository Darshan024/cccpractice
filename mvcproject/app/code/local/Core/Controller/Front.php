<?php
class Core_Controller_Front{
public function init(){
    $requestModel=new Core_Model_Request();
    $moduleName=$requestModel->getModuleName();
    $controllerName=$requestModel->getControllerName();
    $actionName=$requestModel->getActionName();
    $actionName.= 'Action';
    $fullClassName=$requestModel->getFullControllerClass();
    $controllerObject=new $fullClassName();
    $controllerObject->$actionName();
}
}
?>