<?php
class Admin_Controller_User extends Core_Controller_Admin_Action
{
    protected $_allowedAction = ['login'];
    public function loginAction()
    {
        if (!$this->getRequest()->isPost()) {
            $layout = $this->getLayout();
            $layout->getChild('head')->addCss('product/form.css');
            $child = $layout->getChild("content");
            // print_r($layout->getChild('header'));
            $layout->removeChild('header');
            $layout->removeChild('footer');
            $loginForm = $layout->createBlock("admin/login");
            $child->addChild('form', $loginForm);
            $layout->toHtml();
        } elseif ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParams('login');
            $email = $data['customer_email'];
            $password = $data['password'];
            $userpassword = 15;
            $useremail = 'email15@example.com';
            if ($password == $userpassword && $useremail == $email) {
                Mage::getSingleton('core/session')->set('logged_in_admin_user_id', 1);
                $this->setRedirect('admin/banner/form');

            } else {
                $this->setRedirect('admin/user/login');
            }
        }
    }
    public function logoutAction()
    {
        Mage::getSingleton('core/session')->remove('logged_in_admin_user_id');
        $this->setRedirect('');
    }
}
?>