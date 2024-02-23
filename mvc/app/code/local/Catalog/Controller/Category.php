<?php

class Catalog_Controller_Category extends Core_Controller_Front_Action
{
    public function formAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $categoryForm = $layout->createBlock('catalog/admin_Category');
        $child->addChild('form', $categoryForm);
        $layout->toHtml();
    }
}