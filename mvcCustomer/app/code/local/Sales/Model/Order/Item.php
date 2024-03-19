<?php
class Sales_Model_Order_Item extends Core_Model_Abstract
{
    public function init()
    {
        $this->_modelClass = "sales/order_item";
        $this->_resourceClass = "Sales_Model_Resource_Order_Item";
        $this->_collectionClass = "Sales_Model_Resource_Collection_Order_Item";
    }
    public function getProductCollection($id)
    {
        $product = Mage::getModel('catalog/product')->load($id);
        return $product;
    }
    protected function _beforeSave()
    {
        $product = $this->getProductCollection($this->getProductId());
        $this->addData('product_color', $product->getColor());
        $this->addData('product_name', $product->getName());
    }
}
?>