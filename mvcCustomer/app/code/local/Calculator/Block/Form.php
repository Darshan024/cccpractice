<?php
class Calculator_Block_Form extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate("calculator/form.phtml");
    }
    public function getForm()
    {
        return Mage::getModel('calculator/calculator')->load($this->getRequest()->getParams('id', 0));
    }
    public function getUser(){
        return (!is_null(Mage::getSingleton('core/session')->get('session_id'))) ? Mage::getSingleton('core/session')->get('session_id') : '';
    }
}
?>