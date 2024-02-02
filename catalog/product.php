<?php
include 'sql/connection.php';
include 'sql/functions.php';
$action=isset($_GET['action'])?$_GET['action']:null;
$pname=isset($_GET['id'])?$_GET['id']:null;
if($action=='edit'){
    // $pname=$_GET['id'];
    $col=['pname','sku','product_type','category','manufacture_cost','shipping_cost','total_cost','price','stetus','created_at','updated_at'];
    $sql=select('ccc_product',$col)." WHERE pname='$pname'";;
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
}
elseif($action=='delete'){
    $pname=$_GET['id'];
    $sql=delete('ccc_product',['pname'=>"$pname"]);
    if($result=mysqli_query($con,$sql)){
        echo "<br>Deleted Succesfully<br>";
        echo "<a href='product_list.php'>Prodcut List</a><br>";
        echo "<a href='product.php'>Insert new product</a>";
        exit();
    }
}
else{
    $row['pname']='';
    $row['sku']='';
    $row['product_type']='';
    $row['category']='';
    $row['manufacture_cost']='';
    $row['shipping_cost']='';
    $row['total_cost']='';
    $row['price']='';
    $row['stetus']='';
    $row['created_at']='';
    $row['updated_at']='';
}
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
    <td> <input type="radio" name="group1[product_type]" value="Simple"<?php echo ($row['product_type']=='simple')?'checked':'';?>>Simple&nbsp;&nbsp;
        <input type="radio" name="group1[product_type]" value="Bundle"<?php echo ($row['product_type']=='Bundle')?'checked':''; ?>>Bundle</td>
    </tr>
    
    <tr>
    <td>Select category</td>
    <td><select name="group1[category]">
        <option value="Bar"<?php echo($row['category']=='Bar')?'selected':''; ?>>Bar & Game Room</option>
        <option value="Bedroom"<?php echo($row['category']=='Bedroom')?'selected':''; ?>>Bedroom</option>
        <option value="Decor"<?php echo($row['category']=='Decor')?'selected':''; ?>>Decor</option>
        <option value="Dining"<?php echo($row['category']=='Dining')?'selected':''; ?>>Dining & Kitchen</option>
        <option value="Lighting"<?php echo($row['category']=='Lighting')?'selected':''; ?>>Lighting</option>
        <option value="Living_Room"<?php echo($row['category']=='Living_Room')?'selected':''; ?>>Living Room</option>
        <option value="Mattreses"<?php echo($row['category']=='Mattreses')?'selected':''; ?>>Mattreses</option>
        <option value="Office"<?php echo($row['category']=='Office')?'selected':''; ?>>Office</option>
        <option value="Outdoor"<?php echo($row['category']=='Outdoor')?'selected':''; ?>/>Outdoor</option>
    </select></td>  
    </tr>

    <!-- <tr>
        <td>Select category</td>
        <td><select name="category">
            <?php
                $result=getCategories('ccc_category');
                while($r=mysqli_fetch_assoc($result)){
                    $selected = ($r['cat_id']==$row['category']) ?'selected':'';
                    echo "<option value='{$r['cat_id']}'>{$r['name']}{$r['cat_id']}</option>";
                //   echo "<option value='{$row1['cat_id']}'>{$row1['name']}</option>";
                }
            ?>
        </select></td>
    </tr> -->

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
    <td><select name="group1[stetus]">
    <option value="Enabled"<?php echo ($row['stetus']=='Enabled')?'selected':'';?> >Enabled</option>
    <option value="Disabled"<?php echo ($row['stetus']=='Disabled')?'selected':'';?> >Disabled</option>
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
    <tr><td><input type="submit" name='submit' value="<?php echo $pname ? 'update':'Insert';?>"></td></tr>
    </form>
    </table>
</body>
</html>