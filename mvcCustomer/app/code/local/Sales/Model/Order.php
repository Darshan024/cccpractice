<?php
class Sales_Model_Order extends Core_Model_Abstract
{
    public function init()
    {
        $this->_modelClass = 'sales/order';
        $this->_resourceClass = 'Sales_Model_Resource_Order';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Order';
    }
    protected function _beforeSave()
    {
        $this->removeData('quote_id');
        $this->removeData('shipping_method');
        $this->removeData('payment_method');
    }
}
?>