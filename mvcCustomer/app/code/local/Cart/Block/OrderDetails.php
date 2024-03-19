<?php
class Cart_Block_OrderDetails extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('cart/order.phtml');
    }
    public function getOrderItems($orderId)
    {
        return Mage::getModel('sales/order_item')->getCollection()->addFieldToFilter('order_id', $orderId);
    }
    public function getCustomerDetails()
    {
        return Mage::getModel('sales/order_customer')->getCollection()->addFieldToFilter('customer_id', Mage::getSingleton('core/session')->get('customer_id'));
    }
    public function getOrder($orderId){
        return Mage::getModel('sales/order')->getCollection()->addFieldToFilter('order_id', $orderId);
    }
}
?>