<?php
class Admin_Controller_Sales extends Core_Controller_Admin_Action
{
    public function orderAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss('order/cancel.css');
        $layout->getChild('head')->addCss('order/order.css');
        $child = $layout->getChild('content');
        $order = $layout->createBlock('sales/admin_order_order');
        $child->addChild('order', $order);
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
        $this->setRedirect('admin/sales/order');
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
        $this->setRedirect('admin/sales/order');
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
        $this->setRedirect('admin/sales/order');
    }
    public function viewAction(){
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $order = $layout->createBlock('sales/admin_order_view');
        $child->addChild('order', $order);
        $layout->toHtml();
    }
}
?>