<?php
class Catalog_Block_Admin_Product_Form extends Core_Block_Template
{
   
    public function __construct()
    {
        $this->setTemplate('catalog/admin/product/form.phtml');
    }
    public function formData(){
        $productModel = Mage::getModel('catalog/product');
        $id = $this->getRequest()->getParams('id');
        $sku=$this->getRequest()->getParams('id') ? $productModel->getSku() : ''; 
    }
}

