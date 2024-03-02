<?php
class Admin_Controller_User extends Core_Controller_Admin_Action
{
    protected $_allowedAction = ['login'];
    public function loginAction()
    {
        if (!$this->getRequest()->isPost()) {
            $layout = $this->getLayout();
            $layout->getChild('head')->addCss('product/form.css');
            // $layout->removeChild('header');
            // $header=$layout->createBlock('core/template')->setTemplate('admin/header.phtml');
            // $layout->addChild('adminheder',$header);
            $child = $layout->getChild("content");
            $loginForm = $layout->createBlock("admin/login");
            $child->addChild('form', $loginForm);
            $layout->toHtml();
        }
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParams('login');
            $email = $data['customer_email'];
            $password = $data['password'];
            $pass=15;
            $useremail='email15@example.com';
            if ($password==$pass && $useremail==$email) {
                Mage::getSingleton('core/session')->set('logged_in_admin_user_id', 1);
                $this->setRedirect('');
            } else {
                $this->setRedirect('admin/user/login');
            }
        }
    }

}
?>