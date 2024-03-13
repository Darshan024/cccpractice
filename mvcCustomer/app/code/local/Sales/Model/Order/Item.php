<?php
class Sales_Model_Order_Item extends Core_Model_Abstract
{
    public function init()
    {
        $this->_modelClass = "sales/order_item";
        $this->_resourceClass = "Sales_Model_Resource_Order_Item";
        $this->_collectionClass = "Sales_Model_Resource_Collection_Order_Item";
    }
    protected function _beforeSave()
    {
        $this->removeData('quote_id');
        $this->removeData('item_id');
    }
}
?>