<?php
class Sales_Model_Order_Payment extends Core_Model_Abstract{
    public function init(){
        $this->_modelClass = "sales/order_payment";
        $this->_resourceClass = "Sales_Model_Resource_Order_Payment";
        $this->_collectionClass = "Sales_Model_Resource_Collection_Order_Payment";
    }
    public function addPayment($paymentdata){
        $paymentdata->removeData('payment_id');
        $paymentdata->removeData('quote_id');
        $this->setData($paymentdata->getData())->save();
        return $this;
    }
}
?>