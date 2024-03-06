<?php
class Core_Controller_Front_Action
{
    protected $_layout = null;

    public function __construct()
    {
        $this->init();
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('header.css');
        $layout->getChild('head')
            ->addCss('footer.css');
    }
    public function init()
    {
        return $this;
    }
    public function getLayout()
    {
        if (is_null($this->_layout)) {
            $this->_layout = Mage::getBlock('core/layout');
        }
        return $this->_layout;
    }

    public function getRequest()
    {
        return Mage::getModel('core/request');
    }
    public function setRedirect($url)
    {
        $url = Mage::getBaseUrl($url);
        header('Location:' . $url);
    }
    public function getResult($data)
    {
        $result = null;
        if ($data['operator'] == 'add') {
            $result = $data['from_number'] + $data['to_number'];
            return $result;
        } elseif ($data['operator'] == 'sub') {
            $result = $data['from_number'] - $data['to_number'];
            return $result;
        } elseif ($data['operator'] == 'mul') {
            $result = $data['from_number'] * $data['to_number'];
            return $result;
        } elseif ($data['operator'] == 'div') {
            $result = $data['from_number'] / $data['to_number'];
            return $result;
        }
    }
}
?>