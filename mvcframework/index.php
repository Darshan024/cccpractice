<?php
include 'Lib/autoload.php';
$request = new Model_Request();

if ($request->getquerydata('action') == null) {
    if ($request->getpostdata('pdata') == null) {
        $product = new View_Product();
        echo $product->tohtml();
    } else {
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
} elseif ($request->getquerydata('action') == 'edit') {
    $product = new Model_Product();
    $view = new View_Product();
    $result = $product->getpdata($request->getquerydata('id'));
    $view->setData($result);
    if ($request->isPost()) {
        $product->update($request->getparams('pdata'), array('product_id' => $request->getquerydata('id')));
        echo "Updated Successfully<br>";
        echo "<a href='?action=list'>click here for list</a><br>";
        echo "<a href='index.php'>Add new Product</a>";
    } else {
        echo $view->tohtml();
    }
} elseif ($request->getquerydata('action') == 'delete') {
    $product = new Model_Product();
    $id = $request->getquerydata('id');
    $product->delete($id);
    echo "Deleted Successfully<br>";
    echo "<a href='?action=list'>click here for list</a><br>";
    echo "<a href='index.php'>Add new Product</a>";
} elseif ($request->getquerydata('action') == 'list') {
    $product = new Model_Product();
    $view = new View_List();
    $result = $product->get();
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    $view->showlist($data);
}
