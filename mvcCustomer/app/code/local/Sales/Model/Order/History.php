<?php
class Sales_Model_Order_History extends Core_Model_Abstract
{
    public function init()
    {
        $this->_modelClass = 'sales/order_history';
        $this->_resourceClass = 'Sales_Model_Resource_Order_History';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Order_History';
    }
    public function addHistory($order)
    {
        $this->addData('order_id', $order);
        $this->addData('from_status', 'pending');
        $this->addData('to_status', 'pending');
        $this->addData('action_by', 1);
        $this->save();
        return $this;
    }
    public function updateHistory($order, $actionBy)
    {
        $data = [
            'order_id' => $order['order_id'],
            'from_status' => $this->getfromStatus($order['order_id']),
            'to_status' => $order['status'],
            'action_by' => $actionBy
        ];
        $this->setData($data)->save();
        return $this;
    }
    public function getfromStatus($orderId)
    {
        $order = Mage::getModel('sales/order')->getCollection()->addFieldToFilter('order_id', $orderId)->getFirstItem();
        $status = $order->getStatus();
        return $status;
    }
}
?>