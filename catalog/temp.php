<pre><?php
class Data_Object {
    protected $_data=[];
    public function __construct($temp)
    {
        $this->_data=$temp;
    }
    public function __call($name, $arguments)
    {
        $name= substr($name,3);
        return $this->_data[$name];
    }
}
class Data_collection_object{
    protected $_data=[];
    public function addData($temp)
    {
        foreach($temp as $_temp){
            $this->_data[]=new Data_Object($_temp);

        }
    }
    public function getData(){
        return $this->_data;
    }
    
}
$temp[]=["Product_id"=>1,"Sku"=>2,"Product_type"=>3];
$temp[]=["Product_id"=>1,"Sku"=>2,"Product_type"=>3];
$obj=new Data_collection_object();
$obj->addData($temp);
foreach($obj->getData() as $_data){
    print_r($_data->getProduct_id());
}
// print_r($obj);
// print_r($obj->getSku());
// print_r($obj->getProduct_type());
