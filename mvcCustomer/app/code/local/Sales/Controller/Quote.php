<?php
class Sales_Controller_Quote extends Core_Controller_Front_Action
{
    public function addAction()
    {
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParams('productData');
            $quote = Mage::getSingleton("sales/quote")
                ->addProduct($data);
            $this->setRedirect('cart/index/index');
        } else {
            echo "Data Not Found";
        }
    }
    public function deleteAction()
    {
        $id = $this->getRequest()->getParams('id');
        Mage::getSingleton('sales/quote')
            ->removeProduct($id);
        $this->setRedirect('cart/index/index');
    }
    public function updateAction()
    {
        if (!$this->getRequest()->isPost()) {
            $layout = $this->getLayout();
            $child = $layout->getChild('content');
            $form = $layout->createBlock('sales/form');
            $child->addChild('form', $form);
            $layout->toHtml();
        } elseif ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParams('data');
            $quote = Mage::getSingleton("sales/quote")
                ->updateProduct($data);
            $this->setRedirect('cart/index/index');
        } else {
            echo "Data Not Found";
        }
    }
}
?>