<?php
class Sales_Controller_Quote extends Core_Controller_Front_Action
{
    public function addAction()
    {
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParams('productData');
            print_r($data);
        } else {
            echo "Data Not Found";
        }
    }
}
?>