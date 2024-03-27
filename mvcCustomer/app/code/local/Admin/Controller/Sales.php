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
            $actionByAdmin = Sales_Model_Status::ADMIN_ORDER_STATUS;
            $data = $this->getRequest()->getParams('order');
            Mage::getModel('sales/order_history')->updateHistory($data,$actionByAdmin);
            Mage::getModel('sales/order')->setData($data)->save();
            $this->setRedirect('admin/order');
        }
        $this->setRedirect('admin/sales/order');
    }
    public function acceptAction()
    {
        $orderId = $this->getRequest()->getParams('id');
        $actionByAdmin = Sales_Model_Status::ADMIN_ORDER_STATUS;
        $status = Mage::getModel('sales/status')->getStatusOptions();
        $data = [
            'order_id' => $orderId,
            'status' => $status['Canceled']
        ];
        Mage::getModel('sales/order_history')->updateHistory($data, $actionByAdmin);
        Mage::getModel('sales/order')->setData($data)->save();
        $this->setRedirect('admin/sales/order');
    }
    public function rejectAction()
    {
        $orderId = $this->getRequest()->getParams('id');
        $actionByAdmin = Sales_Model_Status::ADMIN_ORDER_STATUS;
        $status = Mage::getModel('sales/status')->getStatusOptions();
        $data = [
            'order_id' => $orderId,
            'status' => $status['Declined']
        ];
        Mage::getModel('sales/order_history')->updateHistory($data, $actionByAdmin);
        Mage::getModel('sales/order')->setData($data)->save();
        $this->setRedirect('admin/sales/order');
    }
    public function viewAction(){
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss('admin/orderview.css');
        $child = $layout->getChild('content');
        $order = $layout->createBlock('sales/admin_order_view');
        $child->addChild('order', $order);
        $layout->toHtml();
    }
}
?>