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
