<?php
class Customer_Block_Details extends Core_Block_Template
{
    protected $_customerId;
    public function __construct()
    {
        $this->setTemplate("customer/dashboard.phtml");
    }
    public function setCustomerId($customerId)
    {
        $this->_customerId = $customerId;
    }
    public function getCusomerDetails()
    {
        if (!$this->_customerId) {
            return null;
        }
        return Mage::getModel("customer/customer")->load($this->_customerId);
    }
}
?>