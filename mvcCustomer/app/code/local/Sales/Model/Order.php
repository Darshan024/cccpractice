<?php
class Sales_Model_Order extends Core_Model_Abstract
{

    public function getQuoteCollection($id)
    {
        return Mage::getSingleton('sales/quote')->load($id);
    }
    public function addOrder($id)
    {
        $quoteCollection = $this->getQuoteCollection($id);
        print_r($quoteCollection);
    }
}
?>