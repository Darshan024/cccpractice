<?php
class Catalog_Block_Category_View extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate("catalog/category/view.phtml");
    }
    public function getProductData()
    {
        if ($this->getRequest()->getParams("id")) {
            return Mage::getModel("catalog/product")->getCollection()->addFieldToFilter("category_id", $this->getRequest()->getParams("id"));
        } else {
            return Mage::getModel("catalog/product")->getCollection();
        }
    }
    
}
?>