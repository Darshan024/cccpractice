<?php
class Calculator_Block_Form extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate("calculator/form.phtml");
    }
    public function getUserName(){
        return Mage::getModel('calculator/calculator')->load($this->getRequest()->getParams('id'),0);
    }
}
?>