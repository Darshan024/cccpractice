<?php

class Admin_Controller_Catalog_Category extends Core_Controller_Front_Action
{
    public function formAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $layout->getChild('head')->addCss('product/form.css');
        $categoryForm = $layout->createBlock('catalog/admin_Category_form');
        $child->addChild('form', $categoryForm);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $params = $this->getRequest()->getParams();
        $id = isset($params['id']) ? $params['id'] : NULL;
        $data = $this->getRequest()->getParams('catalog_product');
        $_product = Mage::getModel('catalog/category')
            ->setData($data)
            ->save($id);
    }
    public function deleteAction()
    {
        $id = $this->getRequest()->getParams('id');
        $_product = Mage::getModel('catalog/product')
            ->setId($id)
            ->delete();
    }
}