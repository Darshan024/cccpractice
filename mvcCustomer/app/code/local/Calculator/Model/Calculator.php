<?php
class Calculator_Model_Calculator extends Core_Model_Abstract
{
    public function init()
    {
        $this->_modelClass = 'calculator/calculator';
        $this->_resourceClass = 'Calculator_Model_Resource_Calculator';
        $this->_collectionClass = 'Calculator_Model_Resource_Collection_Calculator';
    }
    public function getItems()
    {
        return Mage::getModel('calculator/calculator')->getCollection()->addFieldToFilter('id', $this->getId());
    }
    protected function _beforeSave()
    {
            if ($this->getOperator() == '+') {
                $result = $this->getFromNumber() + $this->getToNumber();

            } elseif ($this->getOperator() == '-') {
                $result = $this->getFromNumber() - $this->getToNumber();

            } elseif ($this->getOperator() == '*') {
                $result = $this->getFromNumber() * $this->getToNumber();

            } elseif ($this->getOperator()== '/') {
                $result = $this->getFromNumber() / $this->getToNumber();
            }
        
        $this->addData('result', $result);
        $sessionId = $this->getUserName();
        $this->addData('session_id', $sessionId);
    }
}
?>