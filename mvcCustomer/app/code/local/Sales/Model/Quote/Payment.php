<?php
class Sales_Model_Quote_Payment extends Core_Model_Abstract{
    public function init(){
        $this->_modelClass = "sales/quote_payment";
        $this->_resourceClass = "Sales_Model_Resource_Quote_Payment";
        $this->_collectionClass = "Sales_Model_Resource_Collection_Quote_Payment";
    }
    public function getPaymentOption(){
        $paymentOption = [
            "COD" => "Cash On Delivary",
            "CreditCard" => "Credit-card",
            "UPI" => "UPI payment"
        ];
        return $paymentOption;
    }
    public function addPayment(Sales_Model_Quote $quote,$request){
        
        $this->setData($request)->addData('quote_id',$quote->getId())->save();
        return $this;
    }
}
?>