<?php
$id = $_GET["id"];
require_once('index_ConnectionInfo.php');
$con = new mysqli(ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
if ($con->connect_error) {
    die("Connection error");
}
$sql = "SELECT * FROM bag where id=$id";

$result = $con->query($sql);
$obj = null;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $obj = $row;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đặt hàng</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/all.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        p {
            margin-bottom: 10px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0069d9;
        }
    </style>
    <script src="../js/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <h2>Order</h2>
    <form action="BALO_orders_Ad.php" method="post">
        <div class="form-group" style="display: none;">
            <label for="ids">IDs:</label>
            <input type="text" class="form-control" id="ids" name="ids" readonly
                   value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
        </div>
        <div class="product-image">
            <img alt="" width="300" src="image_product/<?php echo $obj['image'] ?>">

        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" id="quantity" name="quantity"
                   value="<?php echo isset($_GET['quantity']) ? $_GET['quantity'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="customer_name">Tên:</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" required>
        </div>
        <div class="form-group">
            <label for="gender">Giới tính:</label>
            <input type="text" class="form-control" id="gender" name="gender" required>
        </div>
        <div class="form-group">
            <label for="phone">SĐT:</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" required>
        </div>
        <p>Payment method:</p>
        <div class="form-group">
            <select class="form-control" id="payment_method" name="payment_method" required>
                <option value="bank_transfer">Payment online</option>
                <option value="cash">Payment on delivery (COD)</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" id="order" class="btn">Order</button>
        </div>
    </form>
</div>
<?php
$id = $_GET["id"];
require_once('index_ConnectionInfo.php');
$con = new mysqli(ConnectionInfo::$hostname, ConnectionInfo::$username, ConnectionInfo::$password, ConnectionInfo::$database);
if ($con->connect_error) {
    die("Connection error");
}
$sql = "SELECT * FROM bag where id=$id";

$result = $con->query($sql);
$obj = null;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $obj = $row;
    }
}
?>
