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
        $actionByCustomer = Sales_Model_Status::DEFAULT_ORDER_STATUS;
        Mage::getModel('sales/order_history')->updateHistory($data, $actionByCustomer);
        Mage::getModel('sales/order')->setData($data)->save();
        $this->setRedirect('cart/index/list');
    }
}
?>