<?php
include 'sql/connection.php';
include 'sql/functions.php';
// echo $_GET['action'];

if($_GET['action']=='edit'){
    $pname=$_GET['id'];
    $col=['pname','sku','product_type','category','manufacture_cost','shipping_cost','total_cost','price','stetus','created_at','updated_at'];
    $sql=select('ccc_product',$col)." WHERE pname='$pname'";;
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
}
else{}
?>

<html>
<head>
    <style>
        /* body{
            background-color: rgb(0, 0, 0);
            color: white;
        
        } */
        .form{
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            margin-top:50px;
            width: 500px;
            height: 90%;
            /* background-color: rgb(0, 0, 0);
            border-radius: 10px;
            color: white; */
        }
        input[type='text']{
            background-color: transparent;
            width: 90%;
            padding: 4px;
            border:none;
            border-bottom: 2px solid rgb(0, 0, 0);
            /* color: white; */
        }

    </style>
<title>PHP_W2</title>
</head>
<body>
    
    <table class="form">
    <form method="post" action ="submit.php">
    <tr>
    <td><labeL>Product Name</labeL></td>
    <td><input type="text" name="group1[pname]" value="<?php echo $row['pname']; ?>" ><br></td>
    </tr>

    <tr>
    <td><label>SKU</label></td>
    <td><input type="text" name="group1[sku]" value="<?php echo $row['sku']; ?>"><br></td>
    </tr>
    <tr>
    <td><label>product type</label></td>
    <td> <input type="radio" name="group1[product_type]" value="<?php echo $row['product_type']; ?>">Simple&nbsp;&nbsp;
        <input type="radio" name="group1[product_type]" value="Bundle">Bundle</td>
    </tr>
    
    <tr>
    <td>Select category</td>
    <td><select name="group1[category]" value="<?php echo $row['category']; ?>">
        <option value="Bar">Bar & Game Room</option>
        <option value="Bedroom">Bedroom</option>
        <option value="Decor">Decor</option>
        <option value="Dining">Dining & Kitchen</option>
        <option value="Lighting">Lighting</option>
        <option value="Living_Room">Living Room</option>
        <option value="Mattreses">Mattreses</option>
        <option value="Office">Office</option>
        <option value="Outdoor">Outdoor</option>
    </select></td>
    </tr>

    <tr>
    <td><labeL>Manufacture cost</labeL></td>
    <td><input type="text" name="group1[manufacture_cost]" value="<?php echo $row['manufacture_cost']; ?>"><br></td>
    </tr>

    <tr>
    <td><labeL>Shipping  Cost</labeL></td>
    <td><input type="text" name="group1[shipping_cost]" value="<?php echo $row['shipping_cost']; ?>"><br></td>
    </tr>

    <tr>
    <td><labeL>Total Cost</labeL></td>
    <td><input type="text" name="group1[total_cost]" value="<?php echo $row['total_cost']; ?>"></td>
    </tr>

    <tr>
    <td><labeL>price</labeL></td>
    <td><input type="text" name="group1[price]" value="<?php echo $row['price']; ?>" ><br></td>
    </tr>

    <tr>
    <td>Select Status</td>
    <td></Select><select name="group1[stetus]" value="<?php echo $row['stetus']; ?>">
    <option>Enabled</option>
    <option>Disabled</option>
    </select></td>
    </tr>

    <tr>
    <td><labeL>Created Date</labeL></td>
    <td><input type="date" name="group1[created_at]" value="<?php echo $row['created_at']; ?>"></td>
    </tr>

    <tr>
    <td><labeL>Updated Date</labeL></td>
    <td><input type="date" name="group1[updated_at]" value="<?php echo $row['updated_at']; ?>"></td>
    </tr>

    <tr><td><input type="submit"></td></tr>
    </form>
    </table>
</body>
</html>
    