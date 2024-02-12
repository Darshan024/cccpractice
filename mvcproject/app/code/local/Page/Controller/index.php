<?php
class Page_Controller_index extends Core_Controller_Front_Action
{
    public function indexAction()
    {
    
        $layout = $this->getLayout()
            ->toHtml();

    }
}
?>