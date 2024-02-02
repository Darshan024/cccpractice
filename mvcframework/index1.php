<?php
include 'Lib/autoload.php';
$product = new Model_Product();
$view = new View_List();
$result = $product->get();
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
$view->showlist($data);
