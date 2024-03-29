<?php
class Catalog_Model_Category extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Catalog_Model_Resource_Category';
        $this->_collectionClass = 'Catalog_Model_Resource_Collection_Category';
        $this->_modelClass = 'catalog/category';
    }
    public function getStatus()
    {
        if (isset($this->_data['status'])) {
            $mapping = [
                1 => "Enabled",
                0 => "Disabled"
            ];
            return $mapping[$this->_data['status']];
        }
    }
}
?>