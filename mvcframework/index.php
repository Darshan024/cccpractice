<?php
include 'Lib/autoload.php';
class Ccc{
    public static function init(){
        $obj=new Controller_Front();
        $obj->init();
    }
}
Ccc::init();

// $request = new Model_Request();
// if ($request->getQuerydata('action') == null) {
//     if ($request->getPostdata('pdata') == null) {
//         $product = new View_Product();
//         echo $product->tohtml();
//     } else {
//         $product = new Model_Product();
//         $product->save($request->getParams('pdata'));
//         echo "<h3>Product Added Successfully</h3>";
//         $view = new View_List();
//         $result = $product->get();
//         $data = [];
//         while ($row = mysqli_fetch_assoc($result)) {
//             $data[] = $row;
//         }
//         $view->showlist($data);
//     }
// } elseif ($request->getQuerydata('action') == 'edit') {
//     $product = new Model_Product();
//     $view = new View_Product();
//     $result = $product->getpdata($request->getQuerydata('id'));
//     $view->setData($result);
//     // $view->check();
//     if ($request->isPost()) {
//         $product->update($request->getParams('pdata'), array('product_id' => $request->getQuerydata('id')));
//         echo "Updated Successfully<br>";
//         echo "<a href='?action=list'>click here for list</a><br>";
//         echo "<a href='index.php'>Add new Product</a>";
//     } else {
//         echo $view->tohtml();
//     }
// } elseif ($request->getQuerydata('action') == 'delete') {
//     $product = new Model_Product();
//     $id = $request->getQuerydata('id');
//     $product->delete($id);
//     echo "Deleted Successfully<br>";
//     echo "<a href='?action=list'>click here for list</a><br>";
//     echo "<a href='index.php'>Add new Product</a>";
// } elseif ($request->getQuerydata('action') == 'list') {
//     $product = new Model_Product();
//     $view = new View_List();
//     $result = $product->get();
//     $data = [];
//     while ($row = mysqli_fetch_assoc($result)) {
//         $data[] = $row;
//     }
//     $view->showlist($data);
// }
?>
