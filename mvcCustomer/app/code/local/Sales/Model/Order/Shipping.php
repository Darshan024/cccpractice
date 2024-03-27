<?php
class Sales_Model_Order_Shipping extends Core_Model_Abstract{
    public function init(){
        $this->_modelClass = "sles/order_shipping";
        $this->_resourceClass = "Sales_Model_Resource_Order_Shipping";
        $this->_collectionClass = "Sales_Model_Resource_Collection_Order_Shipping";
    }
    public function addShipping($shippingdata){
        $this->setData($shippingdata->getData())
                ->removeData('shipping_id')
                ->removeData('quote_id')                
                ->save();
        return $this;
    }
}
?>