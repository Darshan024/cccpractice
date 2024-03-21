<?php
class Sales_Block_Admin_Order_View extends Core_Block_Template
{
    protected $order = '';
    protected $orderId = null;

    public function getOrderId()
    {
        if ($this->orderId === null) {
            $this->orderId = $this->getRequest()->getParams('id');
        }
        return $this->orderId;
    }
    public function __construct()
    {
        $this->setTemplate('sales/admin/order/view.phtml');
    }
    public function getCustomerDetails()
    {
        $this->order = Mage::getModel('sales/order')->load($this->getOrderId());
        $customerId = $this->order->getCustomerId();
        return Mage::getModel('customer/customer')->load($customerId);
    }
    public function getOrder()
    {
        if ($this->order) {
            return $this->order;
        } else {
            $order = Mage::getModel('sales/order')->load($this->getOrderId());
            return $order;
        }
    }
    public function getOrderItems()
    {
        $items = Mage::getModel('sales/order_item')->getCollection()
            ->addFieldToFilter('order_id', $this->getOrderId());
        return $items;
    }
    public function getProductData($productId)
    {
        $product = Mage::getModel('catalog/product')->load($productId);
        return $product;
    }
    public function getShippingData($shippingId)
    {
        echo 123;
        echo $shippingId;
        $shippingData = Mage::getModel('sales/order_shipping')->load($shippingId);
        return $shippingData;
    }
}
?>