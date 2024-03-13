<?php
class Catalog_Controller_Product extends Core_Controller_Front_Action
{
    public function viewAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getChild('head')->addCss('product/view.css');
        $child = $layout->getChild('content');
        $view = $layout->createBlock('catalog/product_view');
        $child->addChild('view', $view);
        $layout->toHtml();

    }
}