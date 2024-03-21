<?php
class Admin_Controller_Order extends Core_Controller_Admin_Action
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss('order/cancel.css');
        $layout->getChild('head')->addCss('order/order.css');
        $child = $layout->getChild('content');
        $order = $layout->createBlock('admin/order_order');
        $child->addChild('order', $order);
        $canceledOrder = $layout->createBlock('admin/order_canceledOrder');
        $child->addChild('list', $canceledOrder);
        $layout->toHtml();
    }
    public function saveAction()
    {
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParams('order');
            Mage::getModel('sales/order_history')->updateHistory($data, 2);
            Mage::getModel('sales/order')->setData($data)->save();
            $this->setRedirect('admin/order');
        }
        $this->setRedirect('admin/order');
    }
    public function acceptAction()
    {
        $orderId = $this->getRequest()->getParams('id');
        $data = [
            'order_id' => $orderId,
            'status' => 'canceled'
        ];
        Mage::getModel('sales/order_history')->updateHistory($data, 2);
        Mage::getModel('sales/order')->setData($data)->save();
        $this->setRedirect('admin/order');
    }
    public function rejectAction()
    {
        $orderId = $this->getRequest()->getParams('id');
        $data = [
            'order_id' => $orderId,
            'status' => 'declined'
        ];
        Mage::getModel('sales/order_history')->updateHistory($data, 2);
        Mage::getModel('sales/order')->setData($data)->save();
        $this->setRedirect('admin/order');
    }
}
?>