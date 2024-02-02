<?php
class Model_Product extends Model_Abstract{
    public $table_name="ccc_product";
    public function __construct()
    {
        
    }
    public function save($data){
        $sql=$this->getquerybuilder()->insert($this->table_name,$data);
        $this->getquerybuilder()->exe($sql);
    }
    public function get(){
        $sql=$this->getquerybuilder()->select($this->table_name,array('product_id','pname','sku','category'));
        $data=$this->getquerybuilder()->exe($sql);
        return $data;
    }
}
?>