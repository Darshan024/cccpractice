<?php
class Sales_Model_Quote extends Core_Model_Abstract{
    public function init(){
        $this->_resourceClass = "Sales_Model_Resource_Quote";
        $this->_collectionClass = "Sales_Model_Resource_Collection_Quote";
    }
}
?>