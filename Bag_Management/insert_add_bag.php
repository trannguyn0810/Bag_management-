<?php
require_once ("index_ConnectionInfo.php");
$con=new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
if($con->connect_error){
    die("Connection error");
}
$sql = "SELECT * FROM bag";
$result = $con->query($sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h3 class="text-primary">Thêm Sản Phẩm</h3>
    <form action="insert_bag.php" method="post">
        <div class="mb-3 mt-3 col-sm-6">
            <label for="Id" class="form-label">Id</label>
            <input type="text" required class="form-control" name="id" id="id"><br>
            <label for="Bag Name" class="form-label">Bag Name</label>
            <input type="text" required class="form-control" name="bag_name" id="bag_name"><br>
            <label for="Color" class="form-label">Color</label>
            <input type="text" required class="form-control" name="color" id="color"><br>
            <label for="Price" class="form-label">Price</label>
            <input type="text" required pattern="[0-9]*" class="form-control" name="price" id="price">
            <label><smal class="text-secondary fst-italic">Chỉ được nhập số</smal></label><br><br>
            <label for="Size" class="form-label">size</label>
            <input type="text" required class="form-control" name="size" id="size"><br>
            <label for="Quantity" class="form-label">Quantity</label>
            <input type="text" required pattern="[0-9]*" class="form-control" name="quantity" id="quantity">
            <label><smal class="text-secondary fst-italic">Chỉ được nhập số</smal></label><br><br>
            <label for="Description" class="form-label">Description</label>
            <input type="text" required class="form-control" name="description" id="description"><br>
            <label for="Image" class="form-label">Image</label>
            <input type="file" required class="form-control" name="image" id="image">
        </div>
        <button type="submit" class="btn btn-primary">submit</button>
    </form>
</div>
</body>
</html>