<?php

class Admin_Controller_Catalog_Product extends Core_Controller_Front_Action
{
    public $id;
    public function formAction()
    {
        $layout = $this->getLayout();
        // $layout->getChild('head')->addJs('page.js');
        // $layout->getChild('head')->addJs('head.js');
        $layout->getChild('head')->addCss('product/form.css');
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('catalog/admin_product');
        // ->setTemplate('product/productForm.phtml');
        $child->addChild('form', $productForm);
        $layout->toHtml();
    }
    public function saveAction()
    {
        // $id = $this->getRequest()->getParams('id');
        $params = $this->getRequest()->getParams();
        $id = isset($params['id']) ? $params['id'] : NULL;
        $data = $this->getRequest()->getParams('catalog_product');
        $_product = Mage::getModel('catalog/product')
            ->setData($data)
            ->save($id);
    }
    public function deleteAction()
    {
        $id = $this->getRequest()->getParams('id');
        $_product = Mage::getModel('catalog/product')
            ->delete($id);
    }

}
