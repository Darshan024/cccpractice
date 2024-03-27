<?php
class Banner_Block_Home extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('banner/banner.phtml');
    }
    public function getHomePageBanner()
    {
        $bannerData = Mage::getModel('banner/banner')
            ->getCollection()
            ->addFieldToFilter('show_on', 'HomePage');
        return $bannerData;
    }
}
?>