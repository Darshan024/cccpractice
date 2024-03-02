<?php
class Catalog_Controller_Product extends Core_Controller_Front_Action
{

    // public function formAction()
    // {
    //     $layout = $this->getLayout();
    //     $layout->getChild('head')->addJs('page.js');
    //     $layout->getChild('head')->addJs('head.js');
    //     $layout->getChild('head')->addCss('page.css');
    //     $layout->getChild('head')->addCss('head.css');
    //     $child = $layout->getChild('content');
    //     $productForm = $layout->createBlock('catalog/admin_product');
    //     // ->setTemplate('product/productForm.phtml');
    //     $child->addChild('form', $productForm);
    //     $layout->toHtml();
    //     $product = Mage::getModel('catalog/product');
    //     $id = $layout->getRequest()->getQueryData('id');
    //     $product->setId($id);
    // }
    // public function saveAction()
    // {
    //     echo '<pre>';
    //     $data = $this->getRequest()->getParams('catalog_product');
    //     $_product = Mage::getModel('catalog/product')
    //     ->setData($data)
    //     ->save();
    //     // print_r($_product);
    // }
    public function viewAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $view = $layout->createBlock('catalog/product_view');
        $child->addChild('view', $view);
        $layout->toHtml();

    }
}