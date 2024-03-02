<?php
class Admin_Controller_Banner extends Core_Controller_Admin_Action
{
    public function formAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss('product/form.css');
        $child = $layout->getChild('content');
        $bannerForm = $layout->createBlock('banner/admin_form');
        $child->addChild('bannerform', $bannerForm);
        $layout->toHtml();
    }
    public function saveAction()
    {

        $bannerData = $this->getRequest()->getParams('banner');
        if (isset($_POST['submit'])) {
            $imageName = $_FILES['banner_image']['name'];
            $tmp_name = $_FILES['banner_image']['tmp_name'];
            $folder = "media/banner/" . $imageName;
            move_uploaded_file($tmp_name, $folder);
        }
        $bannerData['banner_image'] = $imageName;
        $_product = Mage::getModel('banner/banner')
            ->setData($bannerData)
            ->save();
        print_r($bannerData);
    }
    public function listAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getChild('content');

        $productList = $layout->createBlock('banner/admin_list');
        $child->addChild('list', $productList);
        $layout->toHtml();
    }
    public function deleteAction()
    {
        $id = $this->getRequest()->getParams('id');
        $_product = Mage::getModel('banner/banner')
            ->load($id)
            ->delete();
    }
}
?>