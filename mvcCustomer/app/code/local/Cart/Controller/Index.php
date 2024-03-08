<?php
class Cart_Controller_Index extends Core_Controller_Front_Action
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss('cart/view.css');
        $child = $layout->getChild('content');
        $view = $layout->createBlock('cart/view');
        $child->addChild('view', $view);
        $layout->toHtml();
    }
}
?>