<?php

class Sales_Model_Quote_Item extends Core_Model_Abstract
{

    protected $_product = '';
    public function init()
    {
        $this->_modelClass = 'sales/quote_item';
        $this->_resourceClass = "Sales_Model_Resource_Quote_Item";
        $this->_collectionClass = "Sales_Model_Resource_Collection_Quote_Item";
    }

    public function getProduct()
    {
        if ($this->_product) {
            return $this->_product;
        }
        $this->_product = Mage::getModel('catalog/product')->load($this->getProductId());
        return $this->_product;
    }

    protected function _beforeSave()
    {
        if ($this->getProductId()) {
            $price = (int) $this->getProduct()->getPrice();
            $this->addData('price', $price);
            $qty = (int) $this->getQty();
            $this->addData('row_total', $price * $qty);
        } else {
        }
    }
    public function addItem(Sales_Model_Quote $quote, $productId, $qty)
    {
        $item = $this->getCollection()
            ->addFieldToFilter('product_id', $productId)
            ->addFieldToFilter('quote_id', $quote->getId())
            ->getFirstItem()
        ;

        if ($item) {
            $qty = $qty + $item->getQty();
        }
        $this->setData(
            [
                'quote_id' => $quote->getId(),
                'product_id' => $productId,
                'qty' => $qty,
            ]
        );
        if ($item) {
            $this->setId($item->getId());
        }
        $this->save();
        return $this;
    }
    public function updateItem(Sales_Model_Quote $quote, $id, $qty)
    {
        $item = $this->getCollection()
            ->addFieldToFilter('item_id', $id)
            ->addFieldToFilter('quote_id', $quote->getId())
            ->getFirstItem();
        $this->setData(
            [
                'quote_id' => $quote->getId(),
                'product_id' => $item->getProductId(),
                'qty' => $qty,
            ]
        );
        if ($item) {
            $this->setId($item->getId());
        }
        $this->save();
        return $this;
    }
    public function removeItem(Sales_Model_Quote $quote, $id)
    {
        $item = $this->getCollection()
            ->addFieldToFilter('item_id', $id)
            ->addFieldToFilter('quote_id', $quote->getId())
            ->getFirstItem();
        if ($item) {
            $this->setId($item->getId());
        }
        $this->delete();
        return $this;
    }
}