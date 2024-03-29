<?php
class Cart_Block_Checkout_Checkout extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('cart/checkout.phtml');
    }
    public function getAddressData()
    {
        return Mage::getModel('customer/address')
            ->getCollection()
            ->addFieldToFilter('customer_id', Mage::getSingleton('core/session')->get('customer_id'));
    }
    public function getQuoteId()
    {
        return Mage::getSingleton("core/session")->get("quote_id");
    }
    public function getQuoteItems()
    {
        $quoteId = Mage::getSingleton('core/session')->get('quote_id');
        return Mage::getModel('sales/quote_item')->getCollection()->addFieldToFilter('quote_id', $quoteId);
    }
    public function getPaymentOption()
    {
        return Mage::getModel('sales/quote_payment')->getPaymentOption();
    }
    public function getShippingOption()
    {
        return Mage::getModel('sales/quote_shipping')->getShippingOption();
    }
    public function getCustomerEmail()
    {
        $customer = Mage::getModel('customer/customer')->load(Mage::getSingleton('core/session')->get('customer_id'));
        $customerEmail = $customer->getCustomerEmail();
        return $customerEmail;
    }
}
?>