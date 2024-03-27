<?php
class Agentbranch_Controller_Agentbranch extends Core_Controller_Front_Action
{
    public function formAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $form = $layout->createBlock('agentbranch/form');
        $child->addChild('form', $form);
        $layout->toHtml();
    }
    public function saveAction(){
        $id = $this->getRequest()->getParams('id');
        $this->setRedirect('agentbranch/agentbranch/form?id=' . $id);
    }
}
?>