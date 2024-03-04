<?php

class Core_Controller_Admin_Action extends Core_Controller_Front_Action
{
    protected $_allowedAction = [];
    public function init()
    {
        $this->getLayout()->setTemplate("core/admin.phtml");
        $this->addHeader();
        if (
            !in_array($this->getRequest()->getActionName(), $this->_allowedAction) &&
            !Mage::getSingleton('core/session')->get('logged_in_admin_user_id')
        ) {
            $this->setRedirect('admin/user/login');
        }
    }
    public function addHeader()
    {
        $layout = $this->getLayout();
        $header = $layout->createBlock('admin/header');
        $layout->addChild('header', $header);
        
    }
}
?>