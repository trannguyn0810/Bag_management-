<?php
    $id=$_GET["id"];
    $sql = "SELECT * FROM bag WHERE id=$id";

    require_once ("index_ConnectionInfo.php");
    $con=new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
    if($con->connect_error){
        die("Connection error");
    }

    $result = $con->query($sql);

    $obj = null;
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $obj = $row;
        }
    }
?>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/all.css">
<div class="container">

    <h3 class="text-primary">Sửa Sản Phẩm</h3>
<form action="edit_bag.php" method="get">
    <div class="mb-3 mt-3">
    id <input type="text" required class="form-control" name="id" value="<?php echo $obj['id']; ?>"><br>
    bag name <input type="text" required class="form-control" name="bag_name" value="<?php echo $obj['bag_name']; ?>"><br>
    color <input type="text" required class="form-control" name="color" value="<?php echo $obj['color']; ?>"><br>
    price <input type="number" required class="form-control" name="price" value="<?php echo $obj['price']; ?>">
        <label><smal class="text-secondary fst-italic">Chỉ được nhập số</smal></label><br><br>
    size <input type="text" required class="form-control" name="size" value="<?php echo $obj['size']; ?>"><br>
    quantity <input type="number" required class="form-control" name="quantity" value="<?php echo $obj['quantity']; ?>">
        <label><smal class="text-secondary fst-italic">Chỉ được nhập số</smal></label><br><br>
    description <input type="text" required class="form-control" name="description" value="<?php echo $obj['description']; ?>">
    image<input type="file" required class="form-control" name="image" value="<?php echo $obj['description']; ?>">
    </div>
    <button type="submit" class="btn btn-primary">submit</button>
</form>
</div>