<?php
class Admin_Controller_Calculator extends Core_Controller_Admin_Action
{
    protected $_allowedAction = ['form', 'save', 'list'];
    public function formAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $form = $layout->createBlock('calculator/form');
        $child->addChild('form', $form);
        // $layout->toHtml();
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $list = $layout->createBlock('calculator/list');
        $child->addChild('list', $list);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $data = $this->getRequest()->getParams('calculator');
        Mage::getSingleton('core/session')->set('session_id', $data['id']);
        $result = $this->getResult($data);
        $data['result'] = $result;
        Mage::getModel('calculator/calculator')->setData($data)->save();
    }
    public function listAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $list = $layout->createBlock('calculator/list');
        $child->addChild('list', $list);
        $layout->toHtml();
    }
    public function deleteAction()
    {
        $id = $this->getRequest()->getParam('id');
        Mage::getModel('calculator/calculator')->load($id)->delete();
    }
}
?>