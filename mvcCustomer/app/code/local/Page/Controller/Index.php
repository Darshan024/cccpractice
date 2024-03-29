<?php
class Page_Controller_Index extends Core_Controller_Front_Action
{
    public function IndexAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head');
        $layout->getChild('head')->addJs('page.js');
        $banner = $layout->createBlock('banner/home');
            // ->setTemplate('banner/banner.phtml');
        $layout->getChild('content')
            ->addChild('banner', $banner);
        $layout->toHtml();
    }
}
?>