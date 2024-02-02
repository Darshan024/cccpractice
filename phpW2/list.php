<?php
$conn = mysqli_connect("localhost", "root", "", "ccc_practice");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM ccc_product ORDER BY product_id DESC LIMIT 10;";
$result = mysqli_query($conn, $sql);
echo "Product_name,SKU,product_type,category,manufacture_cost,shipping_cost,total_cost,price,stetus,created_at,updated_at";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<li>" . $row['pname'] .
        "-" . $row['sku'] .
        " -" . $row['product_type'] .
        "-" . $row['category'] .
        "-" . $row['manufacture_cost'] .
        "-" . $row['shipping_cost'] .
        " - " . $row['total_cost'] .
        " -" . $row['price'] .
        "-" . $row['stetus'] .
        "-" . $row['created_at'] .
        "-" . $row['updated_at'] .
        "</li><br>";
}
