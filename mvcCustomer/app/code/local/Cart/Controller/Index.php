<?php
class Cart_Controller_Index extends Core_Controller_Front_Action
{
    protected $_allowedAction = [];
    public function init()
    {
        if (
            !in_array($this->getRequest()->getActionName(), $this->_allowedAction) &&
            !Mage::getSingleton('core/session')->get('customer_id')
        ) {
            $url = Mage::getModel('core/request')->getRequestUri();
            Mage::getSingleton('core/session')->set('get_back_url',$url);
            $this->setRedirect('customer/account/login');
        }
    }
    public function indexAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss('cart/view.css');
        $child = $layout->getChild('content');
        $view = $layout->createBlock('cart/view');
        $child->addChild('view', $view);
        $layout->toHtml();
    }
    public function listAction(){
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss('cart/view.css');
        $child = $layout->getChild('content');
        $view = $layout->createBlock('cart/orderDetails');
        $child->addChild('view', $view);
        $layout->toHtml();
    }
}
?>