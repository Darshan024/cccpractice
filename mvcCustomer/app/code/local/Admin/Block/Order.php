<?php
class Admin_Block_Order extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('admin/order/order.phtml');
    }
    public function getOrderData()
    {
        return Mage::getModel('sales/order')
            ->getCollection();
    }
    public function getOrderItemData($orderId){
        return Mage::getModel('sales/order_item')
            ->getCollection()
            ->addFieldToFilter('order_id', $orderId);
    }
    public function getProductData($productId){
        return Mage::getModel('catalog/product')
            ->getCollection()
            ->addFieldToFilter('product_id', $productId);
    }
    public function getAddressData($orderId){
        return Mage::getModel('sales/order_customer')
            ->getCollection()
            ->addFieldToFilter('order_id', $orderId);
    }
}
?>