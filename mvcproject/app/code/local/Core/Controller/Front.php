<?php
class Core_Controller_Front
{
    public function init()
    {
        $requestModel = Mage::getModel("core/request");
        $actionName = $requestModel->getActionName();
        $actionName .= 'Action';
        $fullClassName = $requestModel->getFullControllerClass();
        $controllerObject = new $fullClassName();
        $controllerObject->$actionName();
    }
}
?>