<?php
class Core_Controller_Front
{
    public function init()
    {
        $coreRequestModel = Mage::getModel('core/request');
        $actionName = $coreRequestModel->getActionName() . 'Action';
        $fullControllerClass = $coreRequestModel->getFullControllerClass();
        $fullControllerObj = new $fullControllerClass();
        $fullControllerObj->$actionName();
    }
}
?>