<?php

class Admin_Controller_Catalog_Product extends Core_Controller_Front_Action
{
    public $id;
    public function formAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss('product/form.css');
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('catalog/admin_product_form');
        // ->setTemplate('catalog/admin/cayegory/form.phtml');
        $child->addChild('form', $productForm);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $data = $this->getRequest()->getParams('catalog_product');
        $_product = Mage::getModel('catalog/product')
            ->setData($data)
            ->save();
        // try {
        //     if (!$this->getRequest()->isPost()) {
        //         throw new Exception("Request is not valid");
        //     }
        //     $data = $this->getRequest()->getParams('pdata');
        //     if (!isset($data['price']) || !is_numeric($data['price'])) {
        //         throw new Exception("Price is required or should be numeric");
        //     }
            
        //     echo "saved";
        //     $id = (isset($data['product_id'])) ? $data['product_id'] : 0;
        //     $data = $this->getRequest()->getParams('pdata');
        //     $productModel = Mage::getModel('catalog/product');
        //     $productModel->setData($data)->save();
        // } catch (Exception $e) {
        //     // var_dump($e->getMessage());
        //     echo $e->getMessage();
        // }
    }
    public function deleteAction()
    {
        $id = $this->getRequest()->getParams('id');
        $_product = Mage::getModel('catalog/product')
            ->load($id)
            ->delete();
    }
    public function listAction(){
        $layout = $this->getLayout();
        $child = $layout->getChild('content');

        $productList = $layout->createBlock('catalog/admin_product_list');
        $child->addChild('list', $productList);
        $layout->toHtml();
    }
}
