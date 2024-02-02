<?php
include 'Lib/autoload.php';
$request = new Model_Request();

if(!$request->isPost()) {
    $product = new View_Product();
    echo $product->tohtml();
}
elseif($request->getquerydata('action')==='delete'){
    echo "Delete";
} 
else { 
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
}
