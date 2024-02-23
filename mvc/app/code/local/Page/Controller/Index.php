<?php
class Page_Controller_Index extends Core_Controller_Front_Action
{
    public function IndexAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head');
        $layout->getChild('head')->addJs('page.js');
        $banner = $layout->createBlock('core/template')
            ->setTemplate('banner/banner.phtml');
        $layout->getChild('content')
            ->addChild('banner', $banner)
            ->addChild('banner1', $banner);

        // print_r($layout->getChild('head'));
        $layout->toHtml();

    }
}
?>