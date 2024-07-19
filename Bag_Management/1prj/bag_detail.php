<?php
session_start();
?>
<?php
$id=$_GET["id"];
require_once ('index_ConnectionInfo.php');
$con = new mysqli(ConnectionInfo::$hostname,ConnectionInfo::$username,ConnectionInfo::$password,ConnectionInfo::$database);
if ($con->connect_error) {
    die ("Connection error");
}
$sql= "SELECT * FROM bag where id=$id";

$result=$con->query($sql);
$obj = null;
if($result-> num_rows > 0) {
    while ($row= $result->fetch_assoc()){
        $obj = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>bag</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="detail.css">
    <link rel="stylesheet" href="css/all.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
    </style>
</head>
<body>

<div class="select-container">
    <a class="nav-link" href="home.php"?page=index>Trang chủ</a>
    <a class="nav-link" href="home.php"?page=index>Balo laptop</a>
    <a class="nav-link" href="home.php"?page=index>Balo du lịch</a>
    <a class="nav-link" href="home.php"?page=index>Túi xách</a>
    <a class="nav-link" href="home.php"?page=index>Phụ kiện</a>
</div>

<div class="header-top">
    <div class="product-image">
        <img src="image_product/<?php echo $obj['image']; ?>" alt="" width="300">
    </div>
    <div class="product-info">
        <p><?php echo $obj['bag_name']; ?></p>
        <p><?php echo $obj['price']; ?><u>đ</u></p>
        <p>Kích cỡ: <?php echo $obj['size']; ?></p>
        <div class="quantity-container">Số lượng:
            <span class="quantity-control" onclick="updateQuantity(-1)">-</span>
            <input type="text" id="quantity" name="quantity" class="quantity-input" value="1" readonly>
            <span class="quantity-control" onclick="updateQuantity(1)">+</span>
        </div>
        <p><?php echo $obj['description']; ?></p>
        <div class="buy-buttons">
            <a href="bag_cart.php?id=<?php echo $obj['id'] ?>"
               class="btn" type="button" style="background-color: rgba(255,87,34,.1);color: red; border-color: red;">
                <span>Thêm Vào Giỏ Hàng</span>
            </a>

            <a href="session_show.php?id=<?php echo $obj['id'] ?>" class="btn btn-danger" type="button">
                <span>Mua Ngay</span>
            </a>
        </div>
    </div>
</div>

<script>
    function updateQuantity(change) {
        var quantityInput = document.getElementById('quantity');
        var currentValue = parseInt(quantityInput.value);
        var newValue = currentValue + change;

        if (newValue >= 1) {
            quantityInput.value = newValue;
        }
    }
</script>

</body>
</html>





