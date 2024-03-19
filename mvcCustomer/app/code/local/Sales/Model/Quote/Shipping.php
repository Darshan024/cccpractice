<?php
class Sales_Model_Quote_Shipping extends Core_Model_Abstract{
    public function init(){
        $this->_modelClass = "sales/quote_shipping";
        $this->_resourceClass = "Sales_Model_Resource_Quote_Shipping";
        $this->_collectionClass = "Sales_Model_Resource_Collection_Quote_Shipping";
    }
    public function getShippingOption(){
        $shippingOption = [
            "Express" => "Express",
            "Train" => "Train"
        ];
        return $shippingOption;
    }
    public function addShipping(Sales_Model_Quote $quote,$request){
        $this->setData($request)->addData('quote_id',$quote->getId())->save();
        return $this;
    }
}
?>