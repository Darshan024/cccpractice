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
            Mage::getSingleton('core/session')->set('get_back_url', $url);
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
    public function listAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss('cart/view.css');
        $layout->getChild('head')->addCss('order/order.css');
        $child = $layout->getChild('content');
        $view = $layout->createBlock('cart/orderDetails');
        $child->addChild('view', $view);
        $layout->toHtml();
    }
    public function cancelAction()
    {
        $orderId = $this->getRequest()->getParams('id');
        $data = [
            'order_id' => $orderId,
            'status' => 'cancellation_request'
        ];
        Mage::getModel('sales/order_history')->updateHistory($data, 1);
        Mage::getModel('sales/order')->setData($data)->save();
        $this->setRedirect('cart/index/list');
    }
}
?>