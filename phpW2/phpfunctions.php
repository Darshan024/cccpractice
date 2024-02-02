<?php
function fetchFromPost($key)
{
    if (isset($_POST[$key])) {
        return $_POST[$key];
    }
}
function fetFromGet($key)
{
    if (isset($_GET[$key])) {
        return $_GET[$key];
    }
}
function fetchFromRequest($key)
{
    if (isset($_REQUEST[$key])) {
        return $_REQUEST[$key];
    }
}

class SQLFetchFunction
{               
    public function mysqlifetchassoc($result)
    {
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
    
}
$obj = new SQLFetchFunction();
$conn = mysqli_connect("localhost", "root", "", "ccc_practice");
$sql = "SELECT * FROM ccc_product ORDER BY product_id DESC LIMIT 10;";
$result = mysqli_query($conn, $sql);
echo "Product_name,SKU,product_type,category,manufacture_cost,shipping_cost,total_cost,price,stetus,created_at,updated_at";
$rows = $obj->mysqlifetchassoc($result);
foreach ($rows as $row) {
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


