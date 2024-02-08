<?php
class View_Product_List_Greed{
    public function tohtml(){
        echo "Greed class";
    }
    public $action='';
    public function __construct($action)
    {
        $this->action=$action;
    }
    public function getAction(){
        echo $this->action;
    }
}
?>