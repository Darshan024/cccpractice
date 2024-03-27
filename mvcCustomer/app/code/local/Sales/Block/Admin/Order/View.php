<?php
class Sales_Block_Admin_Order_View extends Core_Block_Template
{
    protected $order = '';
    protected $orderId = null;

    public function __construct()
    {
        $this->setTemplate('sales/admin/order/view.phtml');
    }
    public function getOrderId()
    {
        if ($this->orderId === null) {
            $this->orderId = $this->getRequest()->getParams('id');
        }
        return $this->orderId;
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
    public function getCustomerDetails()
    {
        $customerId = $this->getOrder()->getCustomerId();
        return Mage::getModel('customer/customer')->load($customerId);
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
        $shippingData = Mage::getModel('sales/order_shipping')->load($shippingId);
        return $shippingData;
    }
    public function getPaymentData($paymentId)
    {
        $shippingData = Mage::getModel('sales/order_payment')->load($paymentId);
        return $shippingData;
    }
    public function getHistoryData($orderId)
    {
        return Mage::getModel('sales/order_history')
            ->getCollection()
            ->addFieldToFilter('order_id', $orderId);
    }
}
?>