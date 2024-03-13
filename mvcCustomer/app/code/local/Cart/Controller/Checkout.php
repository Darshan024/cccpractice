<?php
class Cart_Controller_Checkout extends Core_Controller_Front_Action
{
    protected $_allowedAction = [];
    public function init()
    {
        if (
            !in_array($this->getRequest()->getActionName(), $this->_allowedAction) &&
            !Mage::getSingleton('core/session')->get('customer_id')
        ) {
            $this->setRedirect('customer/account/login');
        }
    }
    public function formAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $layout->getChild('head')->addCss('product/form.css');
        $form = $layout->createBlock('cart/checkout_checkout');
        $child->addChild('form', $form);
        $layout->toHtml();
    }
}
?>





