<?php
class Agentbranch_Block_Form extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('agentbranch/form.phtml');
    }
    public function getParents()
    {
        return Mage::getModel('agentbranch/agent')->getCollection();
    }
    public function getChilds()
    {
        return Mage::getModel('agentbranch/branch')
            ->getCollection()
            ->addFieldToFilter('agent_id', $this->getId());
    }
    public function getId(){
        return $this->getRequest()->getParams('id');
    }
}
?>