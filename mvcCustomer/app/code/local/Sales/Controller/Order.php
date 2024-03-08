<?php
class Sales_Controller_Order extends Core_Controller_Front_Action
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
    public function addAction()
    {
        $id = $this->getRequest()->getParams('id');
        $order=Mage::getModel('sales/order')->addOrder($id);
    }
}
?>