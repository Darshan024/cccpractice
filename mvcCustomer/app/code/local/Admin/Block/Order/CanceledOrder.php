<?php
class Admin_Block_Order_CanceledOrder extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('admin/order/canceledorders.phtml');
    }
    public function getOrders()
    {
        return Mage::getModel('sales/order')
            ->getCollection()
            ->addFieldToFilter('status', 'cancellation_request');
    }
}
?>