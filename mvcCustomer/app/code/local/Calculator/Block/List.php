<?php

class Calculator_Block_List extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('calculator/list.phtml');
    }
    public function getCalculatorData(){
        return Mage::getModel('calculator/calculator')->getCollection()->setLimit(10);
    }
}
?>