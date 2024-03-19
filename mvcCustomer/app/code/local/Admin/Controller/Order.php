<?php
class Admin_Controller_Order extends Core_Controller_Admin_Action{
    public function indexAction(){
        $layout = $this->getLayout();
        $child=$layout->getChild('content');
        $order=$layout->createBlock('admin/order');
        $child->addChild('order', $order);
        $layout->toHtml();

    }
}
?>