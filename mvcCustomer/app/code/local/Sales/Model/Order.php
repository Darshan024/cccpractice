<?php
class Sales_Model_Order extends Core_Model_Abstract
{
    public function init()
    {
        $this->_modelClass = 'sales/order';
        $this->_resourceClass = 'Sales_Model_Resource_Order';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Order';
    }

    public function addOrder(Sales_Model_Quote $orderData)
    {
        $this->setData($orderData->getData())
            ->removeData('shipping_id')
            ->removeData('order_id')
            ->removeData('payment_id')
            ->removeData('quote_id')
            ->save();
        return $this;
    }
    public function _beforeSave()
    {
        if (!$this->getId()) {
            $orderData = $this->getCollection()
                ->addOrderBy('order_id', 'DESC')
                ->getFirstItem();
            if (!$orderData) {
                $newOrderNumber = 1;
            } else {
                $newOrderNumber = $orderData->getOrderNumber() + 1;
            }
            $this->addData('order_number', $newOrderNumber);
        }
    }
}
?>