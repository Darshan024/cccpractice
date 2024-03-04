<?php
class Customer_Controller_Account extends Core_Controller_Front_Action
{
    protected $_allowedAction = ['register', 'login', 'forgotpassword'];
    public function init()
    {
        $this->getRequest()->getActionName();
        if (
            !in_array($this->getRequest()->getActionName(), $this->_allowedAction) &&
            !Mage::getSingleton('core/session')->get('customer_id')
        ) {
            $this->setRedirect('customer/account/login');
        }
    }
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
        $data = $this->getRequest()->getParams('customer');
        $email = $data['customer_email'];
        $count = 0;
        $registerData = Mage::getModel('customer/customer')->getCollection()
            ->addFieldToFilter('customer_email', $email);
        foreach ($registerData->getData() as $register) {
            $count++;
        }
        if ($count > 0) {
            echo "email already registred";
            exit;
        }
        $customer = Mage::getModel('customer/customer')
            ->setData($data)
            ->save();
        $this->setRedirect('customer/account/login');
    }
    public function loginAction()
    {
        if (!$this->getRequest()->isPost()) {
            $layout = $this->getLayout();
            $layout->getChild('head')->addCss('product/form.css');
            $child = $layout->getChild("content");
            $loginForm = $layout->createBlock("customer/login");
            $child->addChild('form', $loginForm);
            $layout->toHtml();
        }
        elseif($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParams('login');
            $email = $data['customer_email'];
            $password = $data['password'];
            $customerCollection = Mage::getModel('customer/customer')->getCollection()
                ->addFieldToFilter('customer_email', $email)
                ->addFieldToFilter('password', $password);
            $count = 0;
            $customerId = 0;
            foreach ($customerCollection->getData() as $customer) {
                $count++;
                $customerId = $customer->getCustomerId();
            }
            if ($count == 1) {
                Mage::getSingleton('core/session')->set('customer_id', $customerId);
                $this->setRedirect('customer/account/dashboard');
            } else {
                $this->setRedirect('customer/account/login');
            }
            // $cusotmer = Mage::getModel('customer/customer')
            //     ->setData($data)
            //     ->checkPassword();
            // $id = $cusotmer->getId()['customer_id'];
        }
    }
    public function dashboardAction()
    {
        $customerId = Mage::getSingleton('core/session')->get('customer_id');
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss('customer/details.css');
        $child = $layout->getChild("content");
        $dashboard = $layout->createBlock("customer/details");
        $child->addChild('dashboard',$dashboard);
        $dashboard->setCustomerId($customerId);
        $layout->toHtml();
    }
    public function forgotpasswordAction()
    {
        if (!$this->getRequest()->isPost()) {
            $layout = $this->getLayout();
            $layout->getChild('head')->addCss('product/form.css');
            $child = $layout->getChild('content');
            $forgotForm = $layout->createBlock('customer/forgot');
            $child->addChild('forgot', $forgotForm);
            $layout->toHtml();
        }
        elseif($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParams('forgot');
            $email = $data['customer_email'];
            $customerCollection = Mage::getModel('customer/customer')->getCollection()
                ->addFieldToFilter('customer_email', $email);
            foreach ($customerCollection->getData() as $customer) {
                $customerPassword = $customer->getPassword();
            }
            if (isset($customerPassword)) {
                echo "user password is : " . $customerPassword;
            } else {
                echo "email not registred";
            }
        }
    }
}
?>