<?php
class Sales_Model_Quote_Customer extends Core_Model_Abstract
{
    public function init(){
        $this->_resourceClass = "Sales_Model_Resource_Quote_Customer";
        $this->_collectionClass = "Sales_Model_Resource_Collection_Quote_Customer";
        $this->_modelClass = "sales/quote_customer";
    }
    protected function _beforeSave(){
        $this->addData('quote_id', Mage::getSingleton('core/session')->get('quote_id'));
        $this->addData('customer_id', Mage::getSingleton('core/session')->get('customer_id'));
    }
    public function addCustomerAddress(Sales_Model_Quote $quote,$request){
        $this->setData($request)->save();
    }
}
?>