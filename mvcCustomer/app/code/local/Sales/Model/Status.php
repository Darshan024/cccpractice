<?php
class Sales_Model_Status extends Core_Model_Abstract
{

    const DEFAULT_ORDER_STATUS = 1;
    const DEFAULT_ORDER_STATUS_tEXT = 'pending';
    const ADMIN_ORDER_STATUS = 2;

    public function init()
    {
        $this->_modelClass = 'sales/status';
        $this->_resourceClass = 'Sales_Model_Resource_Status';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Status';
    }
    public function getStatusOptions(){
        $statusOptions = [
            "Pending" => "pending",
            "Canceled" => "canceled",
            "Shipped" => "shipped",
            "Declined" => "declined",
            "Funded" => "funded",
            "Completed" => "completed"
        ];
        return $statusOptions;
    }
}
?>