<?php
class Sales_Controller_Quote extends Core_Controller_Front_Action
{
    public function addAction()
    {
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParams('productData');
            $quote = Mage::getSingleton("sales/quote")
                ->addProduct($data);
        } else {
            echo "Data Not Found";
        }
    }
    public function deleteAction()
    {
        $id = Mage::getSingleton('core/session')->get('quote_id');
        $quote = Mage::getModel('sales/quote')->load($id)->delete();
    }
    public function editAction()
    {
        $id = Mage::getSingleton('core/session')->get('quote_id');
        $quote = Mage::getModel('sales/quote')->load($id);
        echo '<pre>';
        print_r($quote);
    }
}
?>