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
        $defaultstatus = Sales_Model_Status::DEFAULT_ORDER_STATUS_tEXT;
        $defaultaction = Sales_Model_Status::DEFAULT_ORDER_STATUS;
        $this->addData('order_id', $order);
        $this->addData('from_status', '');
        $this->addData('to_status',$defaultstatus);
        $this->addData('action_by', $defaultaction);
        $this->save();
        return $this;
    }
    public function updateHistory($order, $actionBy)
    {
        $data = [
            'order_id' => $order['order_id'],
            'from_status' => $this->getfromStetus($order['order_id']),
            'to_status' => $order['status'],
            'action_by' => $actionBy
        ];
        $this->setData($data)->save();
        return $this;
    }
    public function getfromStetus($orderId)
    {
        $order = Mage::getModel('sales/order')->getCollection()->addFieldToFilter('order_id', $orderId)->getFirstItem();
        $status = $order->getStatus();
        return $status;
    }
}
?>