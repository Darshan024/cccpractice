<?php
class Sales_Block_Form extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate('sales/form.phtml');
    }
    public function getDa(){
        return Mage::getModel('sales/quote_item')->load($this->getRequest()->getParams('id',0));
    }
}
?>