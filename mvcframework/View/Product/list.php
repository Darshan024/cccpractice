<?php
class View_Product_list
{
    // public $action='';
    // public function __construct($action)
    // {
    //     $this->action=$action;
    // }
    // public function tohtml(){
    //     echo "List";
    // }
    // public $request = new Model_Request();
    public function new()
    {
        $product = new View_Product();
        echo $product->tohtml();
        // header("Location: http://localhost/Practice/mvcframework/Product/list/save");
    }
    public function save()
    {
        $request = new Model_Request();
        if ($request->getpostdata('pdata') !== null) {
            $product = new Model_Product();
            $product->save($request->getparams('pdata'));
            echo "<h3>Product Added Successfully</h3>";
            $view = new View_List();
            $result = $product->get();
            $data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            $view->showlist($data);
        } else {
            echo "Data not found for save";
        }
    
    }
    public function list(){
        $request = new Model_Request();
        $product = new Model_Product();
        $view = new View_List();
            $result = $product->get();
            $data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        $view->showlist($data);
    }
    public function delete($id){
        $modelProduct = new Model_Product();
        $modelProduct->delete($id);
        echo "Data deleted successfully";
        $this->list();
    }
    public function edit($id)
    {
        $modelProduct = new Model_Product();
        $modelRequest = new Model_Request();
        $modelProductView = new View_Product();
        $result = $modelProduct->getpdata($id);
        $modelProductView->setData($result);
        if ($modelRequest->isPost()) {
            $a = $modelProduct->update($modelRequest->getParams('pdata'), ['product_id' => $id]);
            echo "Data update successfully";
            $this->list();
        } else {
            echo $modelProductView->toHtml();
        }
    }
    

    // public function toHtml(){
    //     $request=new Model_Request();
    //     if($request->getQuerydata('action')==null){
    //         if($request->getPostdata('pdata')==null){
    //             echo $this->tohtml();
    //         }
    //         elseif($request->getParams('pdata')){
                
    //         }
    //     }
    // }
}
?>