<?php
class Cart_Block_Checkout_Checkout extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('cart/checkout.phtml');
    }
    public function getAddressData()
    {
        return Mage::getModel('customer/customer')->getCollection();
    }
    public function getQuoteId(){
        return Mage::getSingleton("core/session")->get("quote_id");
    }
}
?>