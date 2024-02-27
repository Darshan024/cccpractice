<?php
class Customer_Controller_Account extends Core_Controller_Front_Action
{
    public function registerAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss('product/form.css');
        $child = $layout->getChild("content");
        $customerForm = $layout->createBlock("customer/form");
        $child->addChild('form', $customerForm);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $data = $this->getRequest()->getParams('catalog_product');
        $customer = Mage::getModel('customer/customer')
            ->setData($data)
            ->save();
    }
    public function loginAction()
    {
        if (!$this->getRequest()->isPost()) {
            $layout = $this->getLayout();
            $layout->getChild('head')->addCss('product/form.css');
            $child = $layout->getChild("content");
            $loginForm = $layout->createBlock("customer/Login");
            $child->addChild('form', $loginForm);
            $layout->toHtml();
        }
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParams('login');
            $customerSession = Mage::getSingleton('core/session')->set('email', $data['customer_email']);
            $cusotmer = Mage::getModel('customer/customer')
                ->setData($data)
                ->check();
        }
    }
    public function dashboardAction()
    {
        $customerSession = Mage::getSingleton('core/session')->get('email');
        print_r($customerSession);
    }
    public function forgotpasswordAction()
    {

    }
}
?>